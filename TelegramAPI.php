<?php
namespace TelegramAPI;

class TelegramAPI
{
	/** @var Methods_Factory */
	public $methods;

	/** @var Model_Settings */
	public $settings;

	public function __construct( $token )
	{
		$this->settings = new Model_Settings();
		$this->settings->access_token = $token;

		$this->methods = new Methods_Factory( $this );
	}

}

