<?php
namespace TelegramAPI;

class View_Message extends View_Abstract
{
	public $message_id;
	public $date;
	public $text;
	public $caption;

	/** @var View_User */
	public $from;

	/** @var View_Chat */
	public $chat;

	/** @var View_Photo */
	public $photo;

	public $is_command = false;

	public function __construct( $data )
	{
		$this->message_id = $data->message_id;
		$this->date = $data->date;
		$this->text = $data->text;

		$this->from = new View_User( $data->from );
		$this->chat = new View_User( $data->chat );

		if ( isset( $data->photo ) )
			$this->photo = new View_Photo( $data->photo );
		if ( isset( $data->caption ) )
			$this->caption = $data->caption;

		if ( $this->text[0] === '/' )
			$this->is_command = true;
	}
}