<?php

/*
 * Adds listing parser functions for the Wikivoyage project
 *
 * @package MediaWiki
 * @subpackage Extensions
 *
 * @author Roland Unger
 * @copyright Copyright © 2007 - 2012 Roland Unger
 * v 1.03 of 2012/08/30
 * @license http://www.gnu.org/copyleft/gpl.html GNU General Public License 2.0 or later
 *
 * v 1.02: is_numeric lat, long; communication device symbols
 * v 1.03: adapted to MW 1.20
 */

if ( !defined( 'MEDIAWIKI' ) ) {
	die( 'This file is a MediaWiki extension, it is not a valid entry point' );
}

# Internationalisation file

$dir = dirname( __FILE__ ) . '/';
$wgExtensionMessagesFiles['Listings'] = $dir . 'Listings.i18n.php';

$wgExtensionFunctions[] = 'wfSetupListings';

$wgExtensionCredits['parserhook']['Listings'] = array(
	'path' => __FILE__,
	'name' => 'Listings',
	'url' => 'http://www.wikivoyage.org/tech/Listings_extension',
	'description' => 'Location listings extension',
	'descriptionmsg' => 'listings-desc',
	'author' => 'Roland Unger',
	'version' => '1.03'
);

function wfSetupListings() {
	global $wgParser;

	$wgParser->setHook( 'buy', 'buyListings' );
	$wgParser->setHook( 'do', 'doListings' );
	$wgParser->setHook( 'drink', 'drinkListings' );
	$wgParser->setHook( 'eat', 'eatListings' );
	$wgParser->setHook( 'listing', 'otherlistings' );
	$wgParser->setHook( 'see', 'seeListings' );
	$wgParser->setHook( 'sleep', 'sleepListings' );

	return true;
}

function buyListings( $input, array $args, $parser ) {
	return listings( 'buy', $input, $args, $parser );
}

function doListings( $input, array $args, $parser ) {
	return listings( 'do', $input, $args, $parser );
}

function drinkListings( $input, array $args, $parser ) {
	return listings( 'drink', $input, $args, $parser );
}

function eatListings( $input, array $args, $parser ) {
	return listings( 'eat', $input, $args, $parser );
}

function otherListings( $input, array $args, $parser ) {
	return listings( 'listing', $input, $args, $parser );
}

function seeListings( $input, array $args, $parser ) {
	return listings( 'see', $input, $args, $parser );
}

function sleepListings( $input, array $args, $parser ) {
	return listings( 'sleep', $input, $args, $parser );
}

function listings( $aType, $input, $args, $parser ) {
	$type = $aType;
	$input = $parser->internalParse( trim( $input ) );
	$out = '';
	foreach ( $args as $arg ) $arg = htmlspecialchars( $arg );

	if ( isset( $args['name'] ) ) {
		$name = $args['name'];
	}
	else {
		$name = wfMsgForContent( 'listingsUnknown' );
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
	if ( isset( $args['lat'] ) and is_numeric( $args['lat'] ) ) {
		$lat = $args['lat'];
	} else {
		$lat = 361;
	}
	if ( isset( $args['long'] ) and is_numeric( $args['long'] ) ) {
		$long = $args['long'];
	} else {
		$long = 361;
	}
	if ( isset( $args['tags'] ) ) {
		$tags = $args['tags'];
	} else {
		$tags = 0;
	}

	$position = '';
	if ( ( $lat < 361 ) and ( $long < 361 ) ) {
		if ( !wfEmptyMsg( 'listingsPositionTemplate', wfMsgForContent( 'listingsPositionTemplate' ) ) ) {
			$position = wfMsgForContent( 'listingsPositionTemplate', $lat, $long );
			if ( $position != '' ) {
				$position = $parser->internalParse( '{{' . $position . '}}' );
				$position = wfMsgForContent( 'listingsPosition' ) . ': ' . $position;
			}
		}
	}

	$out = '<strong>' . $name . '</strong>';
	if ( $url != '' ) {
		$out = '<a href="' . $url . '" class="external text" rel="nofollow" title="' . $name . '">' . $out . '</a>';
	}
	if ( $alt != '' ) {
		$out .= ' (<em>' . $alt . '</em>)';
	}
	if ( ( $address != '' ) or ( $directions != '' ) or ( $position != '' ) ) {
		$out .= ', ' . $address;
		if ( ( $directions != '' ) or ( $position != '' ) ) {
			$out .= ' (<em>' . $directions;
			if ( ( $directions != '' ) and ( $position != '' ) ) {
				$out .= ', ';
			}
			if ( $position != '' ) {
				$out .= $position;
			}
			$out .= '</em>)';
		}
	}

	$phoneSymbol = $parser->internalParse( wfMsgForContent( 'listingsPhoneSymbol' ) );
	if ( $phoneSymbol != '' ) {
		$phoneSymbol = '<abbr title="' . wfMsgForContent( 'listingsPhone' ) . '">' . $phoneSymbol . '</abbr>';
	} else {
		$phoneSymbol = wfMsgForContent( 'listingsPhone' );
	}
	$faxSymbol = $parser->internalParse( wfMsgForContent( 'listingsFaxSymbol' ) );
	if ( $faxSymbol != '' ) {
		$faxSymbol = '<abbr title="' . wfMsgForContent( 'listingsFax' ) . '">' . $faxSymbol . '</abbr>';
	} else {
		$faxSymbol = wfMsgForContent( 'listingsFax' );
	}
	$emailSymbol = $parser->internalParse( wfMsgForContent( 'listingsEmailSymbol' ) );
	if ( $emailSymbol != '' ) {
		$emailSymbol = '<abbr title="' . wfMsgForContent( 'listingsEmail' ) . '">' . $emailSymbol . '</abbr>';
	} else {
		$emailSymbol = wfMsgForContent( 'listingsEmail' );
	}
	$tollfreeSymbol = $parser->internalParse( wfMsgForContent( 'listingsTollfreeSymbol' ) );
	if ( $tollfreeSymbol != '' ) {
		$tollfreeSymbol = '<abbr title="' . wfMsgForContent( 'listingsTollfree' ) . '">' . $tollfreeSymbol . '</abbr>';
	} else {
		$tollfreeSymbol = wfMsgForContent( 'listingsTollfree' );
	}

	if ( ( $phone != '' ) or ( $tollfree != '' ) ) {
		$out .= ', ' . $phoneSymbol . ' ' . $phone;
		if ( $tollfree != '' ) {
			$out .= ' (' . $tollfreeSymbol . ': ' . $tollfree . ')';
		}
	}
	if ( $fax != '' ) {
		$out .= ', ' . $faxSymbol . ': ' . $fax;
	}
	if ( $email != '' ) {
		$out .= ', ' . $emailSymbol . ': ' . '<a class="email" href="mailto:' . $email . '">' . $email . '</a>';
	}
	$out .= '. ';

	if ( $hours != '' ) {
		$out .= $hours . '. ';
	}
	if ( ( $checkin != '' ) or ( $checkout != '' ) ) {
		if ( $checkin != '' ) {
			$out .= wfMsgForContent( 'listingsCheckin' ) . ': ' . $checkin;
			if ( $checkout != '' ) {
				$out .= ', ';
			}
		}
		if ( $checkout != '' ) {
			$out .= wfMsgForContent( 'listingsCheckout' ) . ': ' . $checkout;
		}
		$out .= '. ';
	}
	if ( $price != '' ) {
		$out .= $price . '. ';
	}

	if ( $input != '' ) {
		$out .= $input;
	}

	return $out;
}
