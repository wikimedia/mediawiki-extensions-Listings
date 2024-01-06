<?php

namespace MediaWiki\Extension\Listings;

use MediaWiki\Hook\ParserFirstCallInitHook;
use MediaWiki\Html\Html;
use MediaWiki\Parser\Sanitizer;
use Parser;

class Listings implements ParserFirstCallInitHook {

	/**
	 * Register parser hooks
	 *
	 * @param Parser $parser
	 */
	public function onParserFirstCallInit( $parser ) {
		$parser->setHook( 'buy', [ self::class, 'buyListings' ] );
		$parser->setHook( 'do', [ self::class, 'doListings' ] );
		$parser->setHook( 'drink', [ self::class, 'drinkListings' ] );
		$parser->setHook( 'eat', [ self::class, 'eatListings' ] );
		$parser->setHook( 'listing', [ self::class, 'otherlistings' ] );
		$parser->setHook( 'see', [ self::class, 'seeListings' ] );
		$parser->setHook( 'sleep', [ self::class, 'sleepListings' ] );
	}

	/**
	 * @param string $input
	 * @param array $args
	 * @param Parser $parser
	 * @return string
	 */
	public static function buyListings( $input, array $args, $parser ) {
		return self::listingsTag( 'buy', $input, $args, $parser );
	}

	/**
	 * @param string $input
	 * @param array $args
	 * @param Parser $parser
	 * @return string
	 */
	public static function doListings( $input, array $args, $parser ) {
		return self::listingsTag( 'do', $input, $args, $parser );
	}

	/**
	 * @param string $input
	 * @param array $args
	 * @param Parser $parser
	 * @return string
	 */
	public static function drinkListings( $input, array $args, $parser ) {
		return self::listingsTag( 'drink', $input, $args, $parser );
	}

	/**
	 * @param string $input
	 * @param array $args
	 * @param Parser $parser
	 * @return string
	 */
	public static function eatListings( $input, array $args, $parser ) {
		return self::listingsTag( 'eat', $input, $args, $parser );
	}

	/**
	 * @param string $input
	 * @param array $args
	 * @param Parser $parser
	 * @return string
	 */
	public static function otherListings( $input, array $args, $parser ) {
		return self::listingsTag( 'listing', $input, $args, $parser );
	}

	/**
	 * @param string $input
	 * @param array $args
	 * @param Parser $parser
	 * @return string
	 */
	public static function seeListings( $input, array $args, $parser ) {
		return self::listingsTag( 'see', $input, $args, $parser );
	}

	/**
	 * @param string $input
	 * @param array $args
	 * @param Parser $parser
	 * @return string
	 */
	public static function sleepListings( $input, array $args, $parser ) {
		return self::listingsTag( 'sleep', $input, $args, $parser );
	}

	/**
	 * This method handles messages for phone, fax, tollfree, email
	 * and processes the following messages:
	 * - listings-phone, listings-phone-symbol
	 * - listings-fax, listings-fax-symbol
	 * - listings-tollfree, listings-tollfree-symbol
	 * - listings-email, listings-email-symbol
	 *
	 * @param string $symbolType
	 * @return string
	 */
	private static function getParsedSymbol( string $symbolType ): string {
		$symbolType = wfMessage( "listings-$symbolType" )->inContentLanguage()->escaped();
		$symbol = wfMessage( "listings-$symbolType-symbol" )->inContentLanguage()->parse();
		return $symbol !== '' ? "<abbr title='$symbolType'>$symbol</abbr>" : $symbolType;
	}

	/**
	 * @param string $aType
	 * @param string $input
	 * @param array $args
	 * @param Parser $parser
	 * @return string
	 */
	private static function listingsTag( $aType, $input, $args, $parser ) {
		/*
		 * if a {{listings}} template exists,
		 * feed tag name and parameter list to template verbatim and exit
		 */
		$listingsTemplate = '';
		if ( !wfMessage( 'listings-template' )->inContentLanguage()->isDisabled() ) {
			$listingsTemplate = wfMessage( 'listings-template' )->inContentLanguage()->text();
		}
		if ( $listingsTemplate !== '' ) {
			$inputText = '{{' . $listingsTemplate . '|type=' . $aType;
			foreach ( $args as $key => $value ) {
				$inputText .= '|' . $key . '=' . $value;
			}
			$inputText .= '|' . $input . '}}';
			return $parser->internalParse( $inputText );
		}

		/*
		 * if no pre-defined template exists, generate listing from parameters normally
		 */

		// @todo Should the args be made safe HTML?

		$position = '';
		$lat = ( isset( $args['lat'] ) && is_numeric( $args['lat'] ) ) ? $args['lat'] : 361;
		$long = ( isset( $args['long'] ) && is_numeric( $args['long'] ) ) ? $args['long'] : 361;
		// @fixme: incorrect validation
		if ( $lat < 361 && $long < 361 &&
			!wfMessage( 'listings-position-template' )->inContentLanguage()->isDisabled()
		) {
			$positionTemplate = wfMessage( 'listings-position-template', $lat, $long )
				->inContentLanguage()->text();
			if ( $positionTemplate !== '' ) {
				$parsedTemplate = $parser->internalParse( '{{' . $positionTemplate . '}}' );
				// @todo FIXME: i18n issue (hard coded colon/space)
				$position = wfMessage( 'listings-position' )->inContentLanguage()
					->rawParams( $parsedTemplate )->escaped();
			}
		}

		// @fixme: a lot of localisation-unfriendly patchwork below
		$name = $args['name'] ?? wfMessage( 'listings-unknown' )->inContentLanguage()->text();
		$out = Html::element( 'strong', [], $name );

		$url = $args['url'] ?? '';
		if ( $url !== '' ) {
			$sanitizedHref = Sanitizer::validateAttributes(
				[ 'href' => $url ],
				[ 'href' => true ]
			);
			if ( isset( $sanitizedHref['href'] ) ) {
				$out = Html::rawElement( 'a',
					$sanitizedHref + [ 'class' => 'external text', 'rel' => 'nofollow', 'title' => $name ],
					$out
				);
			}
		}

		$alt = isset( $args['alt'] ) ? $parser->internalParse( $args['alt'] ) : '';
		if ( $alt !== '' ) {
			// @todo FIXME: i18n issue (hard coded parentheses)
			$out .= ' (<em>' . $alt . '</em>)';
		}

		$address = isset( $args['address'] ) ? $parser->internalParse( $args['address'] ) : '';
		$directions = isset( $args['directions'] ) ? $parser->internalParse( $args['directions'] ) : '';
		if ( ( $address !== '' ) || ( $directions !== '' ) || ( $position !== '' ) ) {
			$out .= ', ' . $address;
			if ( ( $directions !== '' ) || ( $position !== '' ) ) {
				// @todo FIXME: i18n issue (hard coded parentheses)
				$out .= ' (<em>' . $directions;
				if ( ( $directions !== '' ) && ( $position !== '' ) ) {
					// @todo FIXME: i18n issue (hard coded comma list or list to text)
					$out .= ', ';
				}
				if ( $position !== '' ) {
					$out .= $position;
				}
				$out .= '</em>)';
			}
		}

		$phone = $args['phone'] ?? '';
		$tollFree = $args['tollfree'] ?? '';
		if ( ( $phone !== '' ) || ( $tollFree !== '' ) ) {
			$phoneSymbol = self::getParsedSymbol( 'phone' );
			// @todo FIXME: i18n issue (hard coded comma list, space)
			$out .= ', ' . $phoneSymbol . ' ' . htmlspecialchars( $phone );
			if ( $tollFree !== '' ) {
				$tollFreeSymbol = self::getParsedSymbol( 'tollfree' );
				// @todo FIXME: i18n issue (hard coded parentheses)
				$out .= ' (' . $tollFreeSymbol . ': ' . htmlspecialchars( $tollFree ) . ')';
			}
		}

		$fax = $args['fax'] ?? '';
		if ( $fax !== '' ) {
			$faxSymbol = self::getParsedSymbol( 'fax' );
			// @todo FIXME: i18n issue (hard coded comma list, colon/space)
			$out .= ', ' . $faxSymbol . ': ' . htmlspecialchars( $fax );
		}

		$email = $args['email'] ?? '';
		if ( $email !== '' ) {
			$emailSymbol = self::getParsedSymbol( 'email' );
			// @todo FIXME: i18n issue (hard comma list, coded colon/space)
			$out .= ', ' . $emailSymbol . ': '
				. Html::element( 'a', [ 'class' => 'email', 'href' => "mailto:$email" ], $email );
		}
		// @todo FIXME: i18n issue (hard coded text)
		$out .= '. ';

		$hours = $args['hours'] ?? '';
		if ( $hours !== '' ) {
			$out .= htmlspecialchars( $hours ) . '. ';
		}

		$checkin = $args['checkin'] ?? '';
		$checkout = $args['checkout'] ?? '';
		if ( ( $checkin !== '' ) || ( $checkout !== '' ) ) {
			if ( $checkin !== '' ) {
				$out .= wfMessage( 'listings-checkin', $checkin )->inContentLanguage()->escaped();
				if ( $checkout !== '' ) {
					// @todo FIXME: i18n issue (hard coded comma list)
					$out .= ', ';
				}
			}
			if ( $checkout !== '' ) {
				$out .= wfMessage( 'listings-checkout', $checkout )->inContentLanguage()->escaped();
			}
			// @todo FIXME: i18n issue (hard coded wut?)
			$out .= '. ';
		}

		$price = $args['price'] ?? '';
		if ( $price !== '' ) {
			// @todo FIXME: i18n issue (hard coded text)
			$out .= htmlspecialchars( $price ) . '. ';
		}

		return $out . $parser->internalParse( $input );
	}
}
