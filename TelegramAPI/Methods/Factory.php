<?php
namespace TelegramAPI;

/**
 * Class Factory
 * @package VkontakteAPI
 *
 * @property-read Methods_Method_GetMe $getMe
 * @property-read Methods_Method_SendMessage $sendMessage
 * @property-read Methods_Method_ForwardMessage $forwardMessage
 * @property-read Methods_Method_SendPhoto $sendPhoto
 */
class Methods_Factory
{
	/** @var Model_Settings */
	private $settings;

	private $storage = array ();

	public function __construct( \TelegramAPI $init )
	{
		$this->settings = $init->settings;
	}

	public function __get( $name )
	{
		if ( !isset( $this->storage[$name] ) )
		{
			$class_name = '\\TelegramAPI\\Methods_Method_' . ucfirst( $name ) . '';
			error_log( PHP_EOL . '$class_name: ' . $class_name . PHP_EOL );

			if ( class_exists( $class_name ) )
			{
				$this->storage[$name] = new $class_name( $this );

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
