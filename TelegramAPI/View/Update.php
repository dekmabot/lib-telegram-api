<?php
namespace TelegramAPI;

class View_Update extends View_Abstract
{
	public $update_id;
	public $message;

	public function __construct( $data )
	{
		$this->update_id = $data->update_id;

		if( isset( $data->message ) )
		{
			$this->message = new View_Message( $data->message );
		}
	}
}