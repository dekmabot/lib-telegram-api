<?php
namespace TelegramAPI;

class Utils_Transport
{

	/** @var \CurlFile[] */
	private $files = array ();

	public function readJson( $url, $params )
	{
		return $this->execute( $url, $params, false );
	}

	public function writeJson( $url, $params )
	{
		return $this->execute( $url, $params, true );
	}

	public function addFile( $field_name, $absolute_filename_path )
	{
		$file_info = new \finfo( FILEINFO_MIME );
		$mime_type = $file_info->buffer( file_get_contents( $absolute_filename_path ) );
		$mime = explode( ';', $mime_type );

		$this->files[$field_name] = curl_file_create( $absolute_filename_path, reset( $mime ), basename( $absolute_filename_path ) );
	}

	private function execute( $url, $params, $is_post )
	{
		$ch = curl_init();

		if ( $is_post )
		{
			foreach ( $this->files as $field_name => $file )
			{
				$params[$field_name] = $file;
			}

			curl_setopt( $ch, CURLOPT_POST, true );
			curl_setopt( $ch, CURLOPT_POSTFIELDS, $params );
		}
		else
		{
			$url .= '?' . $this->paramsArrayToString( $params );
		}

		curl_setopt( $ch, CURLOPT_URL, $url );
		curl_setopt( $ch, CURLOPT_HEADER, 0 );
		curl_setopt( $ch, CURLOPT_RETURNTRANSFER, true );

		$body = curl_exec( $ch );

		curl_close( $ch );

		$this->files = array ();

		$data = json_decode( $body );

		return $data;
	}

	/**
	 * @param array $params
	 *
	 * @return string | null
	 */
	private function paramsArrayToString( array $params )
	{
		if ( !is_array( $params ) || empty( $params ) )
			return null;

		$string = '';
		foreach ( $params as $var => $value )
		{
			if ( !empty( $string ) )
				$string .= '&';

			if ( is_array( $value ) )
			{
				$var .= '[]';
				foreach ( $value as $val )
				{
					if ( !empty( $string ) )
						$string .= '&';

					$string .= $var . '=' . urlencode( $val );
				}
			}
			else
			{
				$string .= $var . '=' . urlencode( $value );
			}
		}

		return $string;
	}

}