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

$wgExtensionCredits['parserhook'][] = array(
	'path' => __FILE__,
	'name' => 'Listings',
	'url' => 'https://www.mediawiki.org/wiki/Extension:Listings',
	'descriptionmsg' => 'listings-desc',
	'author' => 'Roland Unger',
	'version' => '1.2.0'
);

$dir = __DIR__ . '/';
$wgMessagesDirs['Listings'] = __DIR__ . '/i18n';
$wgExtensionMessagesFiles['Listings'] = $dir . 'Listings.i18n.php';
$wgAutoloadClasses['Listings'] = $dir . 'Listings.body.php';

$wgHooks['ParserFirstCallInit'][] = 'Listings::setupHooks';
