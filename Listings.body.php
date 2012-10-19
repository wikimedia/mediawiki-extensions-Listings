<?php

class Listings {
	public static function setupHooks( Parser $parser ) {
		$parser->setHook( 'buy',     array( 'Listings', 'buyListings'   ) );
		$parser->setHook( 'do',      array( 'Listings', 'doListings'    ) );
		$parser->setHook( 'drink',   array( 'Listings', 'drinkListings' ) );
		$parser->setHook( 'eat',     array( 'Listings', 'eatListings'   ) );
		$parser->setHook( 'listing', array( 'Listings', 'otherlistings' ) );
		$parser->setHook( 'see',     array( 'Listings', 'seeListings'   ) );
		$parser->setHook( 'sleep',   array( 'Listings', 'sleepListings' ) );

		return true;
	}

	/**
	 * @param $input
	 * @param $args array
	 * @param $parser Parser
	 * @return string
	 */
	public static function buyListings( $input, array $args, $parser ) {
		return self::listingsTag( 'buy', $input, $args, $parser );
	}

	/**
	 * @param $input
	 * @param $args array
	 * @param $parser Parser
	 * @return string
	 */
	public static function doListings( $input, array $args, $parser ) {
		return self::listingsTag( 'do', $input, $args, $parser );
	}

	/**
	 * @param $input
	 * @param $args array
	 * @param $parser Parser
	 * @return string
	 */
	public static function drinkListings( $input, array $args, $parser ) {
		return self::listingsTag( 'drink', $input, $args, $parser );
	}

	/**
	 * @param $input
	 * @param $args array
	 * @param $parser Parser
	 * @return string
	 */
	public static function eatListings( $input, array $args, $parser ) {
		return self::listingsTag( 'eat', $input, $args, $parser );
	}

	/**
	 * @param $input
	 * @param $args array
	 * @param $parser Parser
	 * @return string
	 */
	public static function otherListings( $input, array $args, $parser ) {
		return self::listingsTag( 'listing', $input, $args, $parser );
	}

	/**
	 * @param $input
	 * @param $args array
	 * @param $parser Parser
	 * @return string
	 */
	public static function seeListings( $input, array $args, $parser ) {
		return self::listingsTag( 'see', $input, $args, $parser );
	}

	/**
	 * @param $input
	 * @param $args array
	 * @param $parser Parser
	 * @return string
	 */
	public static function sleepListings( $input, array $args, $parser ) {
		return self::listingsTag( 'sleep', $input, $args, $parser );
	}

	/**
	 * @param $aType
	 * @param $input
	 * @param $args
	 * @param $parser Parser
	 * @return string
	 */
	private static function listingsTag( $aType, $input, $args, $parser ) {
		$input = $parser->internalParse( trim( $input ) );

		// @todo Should the args be made safe HTML?
		if ( isset( $args['name'] ) ) {
			$name = $args['name'];
		} else {
			$name = wfMessage( 'listingsUnknown' )->inContentLanguage()->text();
		}
		if ( isset( $args['alt'] ) ) {
			$alt = $parser->internalParse( $args['alt'] );
		} else {
			$alt = '';
		}
		if ( isset( $args['address'] ) ) {
			$address = $parser->internalParse( $args['address'] );
		} else {
			$address = '';
		}
		if ( isset( $args['directions'] ) ) {
			$directions = $parser->internalParse( $args['directions'] );
		} else {
			$directions = '';
		}
		if ( isset( $args['phone'] ) ) {
			$phone = $args['phone'];
		} else {
			$phone = '';
		}
		if ( isset( $args['tollfree'] ) ) {
			$tollfree = $args['tollfree'];
		} else {
			$tollfree = '';
		}
		if ( isset( $args['email'] ) ) {
			$email = $args['email'];
		} else {
			$email = '';
		}
		if ( isset( $args['fax'] ) ) {
			$fax = $args['fax'];
		} else {
			$fax = '';
		}
		if ( isset( $args['url'] ) ) {
			$url = $args['url'];
		} else {
			$url = '';
		}
		if ( isset( $args['hours'] ) ) {
			$hours = $args['hours'];
		} else {
			$hours = '';
		}
		if ( isset( $args['price'] ) ) {
			$price = $args['price'];
		} else {
			$price = '';
		}
		if ( isset( $args['checkin'] ) ) {
			$checkin = $args['checkin'];
		} else {
			$checkin = '';
		}
		if ( isset( $args['checkout'] ) ) {
			$checkout = $args['checkout'];
		} else {
			$checkout = '';
		}
		if ( isset( $args['lat'] ) && is_numeric( $args['lat'] ) ) {
			$lat = $args['lat'];
		} else {
			$lat = 361;
		}
		if ( isset( $args['long'] ) && is_numeric( $args['long'] ) ) {
			$long = $args['long'];
		} else {
			$long = 361;
		}

		$position = '';
		if ( $lat < 361 && $long < 361 ) {
			if ( !wfMessage( 'listingsPositionTemplate' )->inContentLanguage()->isDisabled() ) {
				$position = wfMessage( 'listingsPositionTemplate', $lat, $long )->inContentLanguage()->text();
				if ( $position != '' ) {
					$position = $parser->internalParse( '{{' . $position . '}}' );
					// @todo FIXME: i18n issue (hard coded colon/space)
					$position = wfMessage( 'listingsPosition' )->inContentLanguage()->text() . ': ' . $position;
				}
			}
		}

		$out = '<strong>' . $name . '</strong>';
		if ( $url != '' ) {
			$out = '<a href="' . $url . '" class="external text" rel="nofollow" title="' . $name . '">' . $out . '</a>';
		}
		if ( $alt != '' ) {
			// @todo FIXME: i18n issue (hard coded parentheses)
			$out .= ' (<em>' . $alt . '</em>)';
		}
		if ( ( $address != '' ) || ( $directions != '' ) || ( $position != '' ) ) {
			$out .= ', ' . $address;
			if ( ( $directions != '' ) || ( $position != '' ) ) {
				// @todo FIXME: i18n issue (hard coded parentheses)
				$out .= ' (<em>' . $directions;
				if ( ( $directions != '' ) && ( $position != '' ) ) {
					// @todo FIXME: i18n issue (hard coded comma list or list to text)
					$out .= ', ';
				}
				if ( $position != '' ) {
					$out .= $position;
				}
				$out .= '</em>)';
			}
		}

		$phoneSymbol = $parser->internalParse( wfMessage( 'listingsPhoneSymbol' )->inContentLanguage()->text() );
		if ( $phoneSymbol != '' ) {
			$phoneSymbol = '<abbr title="' . wfMessage( 'listingsPhone' )->inContentLanguage()->text() . '">' . $phoneSymbol . '</abbr>';
		} else {
			$phoneSymbol = wfMessage( 'listingsPhone' )->inContentLanguage()->text();
		}
		$faxSymbol = $parser->internalParse( wfMessage( 'listingsFaxSymbol' )->inContentLanguage()->text() );
		if ( $faxSymbol != '' ) {
			$faxSymbol = '<abbr title="' . wfMessage( 'listingsFax' )->inContentLanguage()->text() . '">' . $faxSymbol . '</abbr>';
		} else {
			$faxSymbol = wfMessage( 'listingsFax' )->inContentLanguage()->text();
		}
		$emailSymbol = $parser->internalParse( wfMessage( 'listingsEmailSymbol' )->inContentLanguage()->text() );
		if ( $emailSymbol != '' ) {
			$emailSymbol = '<abbr title="' . wfMessage( 'listingsEmail' )->inContentLanguage()->text() . '">' . $emailSymbol . '</abbr>';
		} else {
			$emailSymbol = wfMessage( 'listingsEmail' )->inContentLanguage()->text();
		}
		$tollfreeSymbol = $parser->internalParse( wfMessage( 'listingsTollfreeSymbol' )->inContentLanguage()->text() );
		if ( $tollfreeSymbol != '' ) {
			$tollfreeSymbol = '<abbr title="' . wfMessage( 'listingsTollfree' )->inContentLanguage()->text() . '">' . $tollfreeSymbol . '</abbr>';
		} else {
			$tollfreeSymbol = wfMessage( 'listingsTollfree' )->inContentLanguage()->text();
		}

		if ( ( $phone != '' ) || ( $tollfree != '' ) ) {
			// @todo FIXME: i18n issue (hard coded comma list, space)
			$out .= ', ' . $phoneSymbol . ' ' . $phone;
			if ( $tollfree != '' ) {
				// @todo FIXME: i18n issue (hard coded parentheses)
				$out .= ' (' . $tollfreeSymbol . ': ' . $tollfree . ')';
			}
		}
		if ( $fax != '' ) {
			// @todo FIXME: i18n issue (hard coded comma list, colon/space)
			$out .= ', ' . $faxSymbol . ': ' . $fax;
		}
		if ( $email != '' ) {
			// @todo FIXME: i18n issue (hard comma list, coded colon/space)
			$out .= ', ' . $emailSymbol . ': ' . '<a class="email" href="mailto:' . $email . '">' . $email . '</a>';
		}
		// @todo FIXME: i18n issue (hard coded text)
		$out .= '. ';

		if ( $hours != '' ) {
			$out .= $hours . '. ';
		}
		if ( ( $checkin != '' ) || ( $checkout != '' ) ) {
			if ( $checkin != '' ) {
				$out .= wfMessage( 'listingsCheckin' )->inContentLanguage()->text() . ': ' . $checkin;
				if ( $checkout != '' ) {
					// @todo FIXME: i18n issue (hard coded comma list)
					$out .= ', ';
				}
			}
			if ( $checkout != '' ) {
				$out .= wfMessage( 'listingsCheckout' )->inContentLanguage()->text() . ': ' . $checkout;
			}
			// @todo FIXME: i18n issue (hard coded wut?)
			$out .= '. ';
		}
		if ( $price != '' ) {
			// @todo FIXME: i18n issue (hard coded text)
			$out .= $price . '. ';
		}

		if ( $input != '' ) {
			$out .= $input;
		}

		return $out;
	}
}
