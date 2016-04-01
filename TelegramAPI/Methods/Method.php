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

	abstract public function execute();

	abstract protected function getMethodName();

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
	protected function call( array $params = array (), $is_post = false )
	{
		$method = $this->getMethodName();

		$url = $this->url_prefix . $this->settings->access_token . '/' . $method;

		if ( !$is_post )
			$data = $this->transport->readJson( $url, $params );
		else
			$data = $this->transport->writeJson( $url, $params );

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

}