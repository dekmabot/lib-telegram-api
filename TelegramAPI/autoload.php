<?php
namespace TelegramAPI;

class autoload
{

	/**
	 * @param bool $prepend
	 */
	public static function register( $prepend = false )
	{
		if ( version_compare( phpversion(), '5.3.0', '>=' ) )
		{
			spl_autoload_register( array ( __CLASS__, 'autoload' ), true, $prepend );
		}
		else
		{
			spl_autoload_register( array ( __CLASS__, 'autoload' ) );
		}
	}

	/**
	 * @param string $class
	 *
	 * @return null
	 */
	public static function autoload( $class )
	{
		$class = str_replace( array ( '_', '\\', '\0' ), array ( '/', '/', '' ), $class );

		$file = $_SERVER['DOCUMENT_ROOT'] . '/' . $class . '.php';
		if ( is_file( $file ) )
		{
//			error_log( PHP_EOL . 'autoload: ' . $file );
			require $file;
		}

		$file = __DIR__ . '/' . $class . '.php';
		if ( is_file( $file ) )
		{
//			error_log( PHP_EOL . 'autoload: ' . $file );
			require $file;
		}

		return null;
	}
}

\TelegramAPI\autoload::register( true );
