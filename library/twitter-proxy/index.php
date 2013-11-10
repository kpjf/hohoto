<?php
	require 'vendor/autoload.php';

	$host = $_SERVER['HTTP_HOST'];
	$pattern = '/\.(\w+)\.\w+/';
	$matches;

	preg_match( $pattern, $host, $matches, PREG_OFFSET_CAPTURE );

	$domain = $matches[1][0];

	if ( $domain == 'nickpavlov' ) {

		$keys = array(
			'consumer_key'    => 'kQmQeYlw4qchfNo1hOwHA',
			'consumer_secret' => '9wNPbzm6TF0n8eN7isIiMDa5WJScAX1EqHS72MtI7pU',
			'user_token'      => '9400562-B8vFFK6MXMiRWGlJLmNx64hCcD4ZxkUgJwzU2YUxLK',
			'user_secret'     => 'ecV0HcP5MKsrqpnInYPXkbzqLyTH87gGGBIz9lONofU'
		);

	} else if ( $domain == 'junctioncraft' ) {

		$keys = array(
			'consumer_key'    => '5X4bEOmKfiLWYzVU1uYxPQ',
			'consumer_secret' => '8F38AzMUgtX1WJbwhoCJ8HfD9hC9A9jIWGZkg6MLns',
			'user_token'      => '9400562-YxMKKl3LwEZvMUNfmgNr4XlLfuPU2dY4McuV5o',
			'user_secret'     => 'KfQ3PknxUpvPNSGe8kB8FIZFih4CyTjApT1ipdKI'
		);
	} else if ( $domain == 'hohoto' ) {
		
		$keys = array(
			'consumer_key'    => 'q5ETeJt6nuRvgh8lceVISA',
			'consumer_secret' => 'mzZMDK1VbbEV898Xtbyfs2LF75U370cMB4FgfZvSE',
			'user_token'      => '9400562-VuYmcCvMyxLsBk6PUXZUzoZOrKwd3rq9IJwTcgGME9',
			'user_secret'     => 'nIpw0IGEjZTF2I2fewFYiWzulrW1GKzvTh5C4gIqrXyjL'
		);
	}

	$tmhOAuth = new tmhOAuth( $keys );

	$data = array();
	$data['screen_name'] = isset($_GET['screen_name']) ? $_GET['screen_name'] : 'zuulinc';
	$data['count'] = isset($_GET['count']) ? $_GET['count'] : 5;



	$code = $tmhOAuth->request('GET', $tmhOAuth->url('1.1/statuses/user_timeline.json'), $data );

	header('Content-type: application/json');

	if ($code == 200) {
	  echo $tmhOAuth->response['response'];
	} else {
	  echo $tmhOAuth->response['response'];
	}

?>