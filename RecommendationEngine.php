<?php
/**
 * RecommendationEngine MediaWiki extension - a "You might like..." recommendation generator
 * @author Salesforce.com Israel
 * @author Dror S. [FFS] for Kol-Zchut
 * @license http://www.gnu.org/copyleft/gpl.html GNU General Public License 2.0 or later
 */

if ( !defined( 'MEDIAWIKI' ) ) {
	die( 'This file is a MediaWiki extension, it is not a valid entry point' );
}

/* Setup */
$GLOBALS['wgExtensionCredits']['parserhook'][] = array(
	'path'           => __FILE__,
	'name'           => 'Kol-Zchut RecommendationEngine',
	'author'         => 'Salesforce.com Israel, Dror S [FFS]',
	'version'        => '0.1.0',
	'descriptionmsg' => 'ext-recoengine-desc',
);

$GLOBALS['wgRecoEngineDB'] = array(
	'server' => 'localhost',
	'name' => null,
	'user' => null,
	'password' => null
);

$GLOBALS['wgAutoloadClasses']['ExtRecoEngineHooks'] = __DIR__ . '/RecommendationEngine.hooks.php';
$GLOBALS['wgAutoloadClasses']['ExtRecoEngine'] = __DIR__ . '/RecommendationEngine_body.php';
$GLOBALS['wgExtensionMessagesFiles']['RecoEngine'] = __DIR__ . '/RecommendationEngine.i18n.php';
$GLOBALS['wgExtensionMessagesFiles']['RecoEngineMagic'] = __DIR__ . '/RecommendationEngine.i18n.magic.php';

$GLOBALS['wgHooks']['ParserFirstCallInit'][] = 'ExtRecoEngineHooks::onParserFirstCallInit';
$GLOBALS['wgHooks']['OutputPageParserOutput'][] = 'ExtRecoEngineHooks::onOutputPageParserOutput';

$resourceTemplate = array(
	'localBasePath' => __DIR__ . '/modules',
	'remoteExtPath' => 'WikiRights/RecommendationEngine/modules',
);

$GLOBALS['wgResourceModules']['ext.recoEngine'] = $resourceTemplate + array(
	'styles' => 'ext.recoEngine.less',
	'position' => 'top',
	'dependencies' => array( 'skins.helena.bootstrap', 'skins.helena.bootstrapOverride' ),
);

unset( $resourceTemplate );
