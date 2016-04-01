<?php
namespace TelegramAPI;

/**
 * Class Factory
 * @package VkontakteAPI
 *
 * @property-read Methods_Method_GetMe $getMe
 */
class Methods_Factory
{
	/** @var Model_Settings */
	private $settings;

	private $storage = array ();

	public function __construct( TelegramAPI $init )
	{
		$this->settings = $init->settings;
	}

	public function __get( $name )
	{
		if ( !isset( $this->storage[$name] ) )
		{
			$class_name = '\\Methods_Method_' . ucfirst( $name ) . '';
			if ( class_exists( $class_name ) )
			{
				$this->storage[$name] = new $class_name();

				return $this->storage[$name];
			}
		}
		else
		{
			return $this->storage[$name];
		}

		throw new \Exception( 'Method ' . $name . ' is not found' );
	}

	/**
	 * @return Model_Settings
	 */
	public function getSettings()
	{
		return $this->settings;
	}

}
