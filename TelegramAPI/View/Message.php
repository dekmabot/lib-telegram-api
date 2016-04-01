<?php
namespace TelegramAPI;

class View_Message extends View_Abstract
{
	public $message_id;
	public $date;
	public $text;

	/** @var View_User */
	public $from;

	/** @var View_Chat */
	public $chat;

	public function fromJson( $data )
	{
		$this->message_id = $data->message_id;
		$this->date = $data->date;
		$this->text = $data->text;

		$this->from = new View_User();
		$this->from->fromJson( $data->from );

		$this->chat = new View_User();
		$this->chat->fromJson( $data->chat );
	}
}