<?php

class TelegramAPI
{
	/** @var \TelegramAPI\Methods_Factory */
	public $methods;

	/** @var \TelegramAPI\Model_Settings */
	public $settings;

	public function __construct( $token )
	{
		$this->settings = new \TelegramAPI\Model_Settings();
		$this->settings->access_token = $token;

		$this->methods = new \TelegramAPI\Methods_Factory( $this );
	}

}

