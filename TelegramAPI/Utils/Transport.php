<?php
namespace TelegramAPI;

class Utils_Transport
{

	public function readJson( $url )
	{
		return $this->execute( $url, false );
	}

	public function writeJson( $url )
	{
		return $this->execute( $url, true );
	}

	private function execute( $url, $is_post )
	{
		$ch = curl_init();

		curl_setopt( $ch, CURLOPT_URL, $url );
		curl_setopt( $ch, CURLOPT_HEADER, 0 );
		curl_setopt( $ch, CURLOPT_RETURNTRANSFER, true );

		if ( $is_post )
			curl_setopt( $ch, CURLOPT_POST, true );

		$body = curl_exec( $ch );

		curl_close( $ch );

		$data = json_decode( $body );

		return $data;
	}

}