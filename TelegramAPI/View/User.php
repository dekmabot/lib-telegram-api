<?php
namespace TelegramAPI;

class View_User extends View_Abstract
{
	public $id;
	public $first_name;
	public $username;

	public $is_bot = false;

	public function fromJson( $data )
	{
		$this->id = $data->id;
		$this->first_name = $data->first_name;
		$this->username = $data->username;

		if ( strtolower( substr( $this->username, -3 ) ) === 'bot' )
			$this->is_bot = true;
	}
}