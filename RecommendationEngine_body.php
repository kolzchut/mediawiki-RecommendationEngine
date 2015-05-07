<?php

class ExtRecoEngine {
	/**
	 * @param $parser Parser
	 * @return String
	 *
	 * @todo Check enabled services for validity
	 */
	public static function functionHook( &$parser ) {
		$parser->getOutput()->setExtensionData( 'RecommendationsTag', true );
	    $output = self::buildWidget( $parser->getTitle() );
	    return array( $output, 'noparse' => true, 'isHTML' => true );
	}


	/**
	 * @param Title $title
	 * @return String
	 *
	 * @todo Check enabled services for validity
	 */
	public static function buildWidget( Title $title ) {
	    global $wgRecoEngineDB;

		$analyticsPageName = urldecode( $title->getLocalURL() );

		$sql = "SELECT * FROM page_rank2 WHERE LandingPage='{$analyticsPageName}' order by Pageviews desc limit 3;";

		// Create connection

		$conn = mysqli_connect(
			$wgRecoEngineDB['server'],
			$wgRecoEngineDB['user'],
			$wgRecoEngineDB['password'],
			$wgRecoEngineDB['name']
		);
		$conn->query( "set character_set_client='utf8'" );
		$conn->query( "set character_set_results='utf8'" );
		$conn->query( "set collation_connection='utf8_general_ci'" );
		//$conn->query("SET NAMES UTF8;");
		// Check connection
		if (!$conn) {
			die("Connection failed: " . mysqli_connect_error());
		}
		//Create Query
		$result = $conn->query( $sql );
		$conn->close();

		$divText = "";

		if ( $result->num_rows > 0 ) {
			$divText = <<<HTML
	<div class="article-recommendations">
		<div class="inner-box">
			<div class="header">
				<h2>אולי תתעניינו ב:</h2>
			</div>
			<ul class="list-inline">
HTML;


			// output data of each row
			while ( $row = $result->fetch_assoc() ) {
				/*
				echo '<div dir="ltr">';
				print_r( $row );
				echo '</div>';
				*/
				$nextPageName = str_replace( "/he/", "", $row["NextPagePath"] );
				$nextPageTitle = Title::newFromText( $nextPageName );
				$nextPageLink = Linker::link( $nextPageTitle );
				//echo "LandingPage: {$row["LandingPage"]} - NextPagePath: {$row["NextPagePath"]} - Page views {$row["Pageviews"]}<br>";
				$divText .= "<li>{$nextPageLink}</li>";
			}
			$divText .= "</ul>";
			// $divText.="<br/><span style=\"  font-size: 7px;\">Powered by Salesforce Israel</span>";
			$divText .= "</div></div>";
		} else {
			// echo "0 results";
		}

		//echo $divText;

		return $divText;
	}

}

