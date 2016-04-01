<?php
namespace TelegramAPI;

/**
 * Class Method
 * @package VkontakteAPI
 *
 * @property-read Utils_Transport $transport
 */
abstract class Methods_Method
{
	/** @var Methods_Factory */
	protected $factory;

	/** @var Model_Settings */
	protected $settings;

	private $url_prefix = 'https://api.telegram.org/bot';

	private $_transport = null;

	public function __construct( Methods_Factory $factory )
	{
		$this->factory = $factory;
		$this->settings = $factory->getSettings();
	}

	abstract public function getMethodName();

	public function __get( $name )
	{
		switch ( $name )
		{
			case 'transport':
				if ( null === $this->_transport )
				{
					$this->_transport = new Utils_Transport( $this );
				}
				return $this->_transport;
		}

		throw new \Exception( $name . ' is not found' );
	}

	/**
	 * @param array $params
	 * @param bool $is_post
	 *
	 * @return View_Response
	 */
	protected function call( array $params = array(), $is_post = false )
	{
		$method = $this->getMethodName();
		$query_string = $this->getQueryString( $method, $params );

		$url = $this->url_prefix . $this->settings->access_token . $query_string;

		if ( !$is_post )
			$data = $this->transport->readJson( $url );
		else
			$data = $this->transport->writeJson( $url );

		$response = new View_Response( $data );

		return $response;
	}

	protected function showError( View_Response $response )
	{
		print( '<hr>' );
		print( 'Error code: ' . $response->error_code . '<br>' );
		print( 'Error description: ' . $response->description . '<br>' );

		exit();
	}

	/**
	 * @param string $method
	 * @param array $get_params
	 * @param array | null $post_params
	 *
	 * @return string
	 */
	private function getQueryString( $method, array $get_params, $post_params = null )
	{
		$get_string = $this->paramsArrayToString( $get_params );

		$post_string = null;
		if ( null !== $post_params )
			$this->paramsArrayToString( $post_params );

		$result = '/' . $method . '?' . $get_string;
		if ( null !== $post_string )
			$result .= '&' . $post_string;

		return $result;
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