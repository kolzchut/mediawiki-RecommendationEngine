<?php

class ExtRecoEngineHooks {


	/**
	 * ParserFirstCallInit hook
	 * Add the parser function for displaying the widget
	 *
	 * @param Parser $parser
	 * @return true
	 */
	public static function onParserFirstCallInit( Parser &$parser ) {
	    $parser->setFunctionHook( 'recommendationstag', array( 'ExtRecoEngine', 'functionHook' ) );

	    return true;
	}


	/**
	 * OutputPageParserOutput hook
	 *
	 * Add the modules to the page
	 *
	 * @param OutputPage $outputPage
	 * @param ParserOutput $parserOutput
	 *
	 * @return true
	 */
	public static function onOutputPageParserOutput(
		OutputPage $outputPage, ParserOutput $parserOutput
	) {
		if ( $parserOutput->getExtensionData( 'RecommendationsTag' ) === true ) {
			$outputPage->addModuleStyles( 'ext.recoEngine' );
		}

	    return true;
	}

}
