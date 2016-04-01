<?php
namespace TelegramAPI;

class Methods_Method_ForwardMessage extends Methods_Method
{
	const MODE_HTML = 'HTML';
	const MODE_MARKDOWN = 'Markdown';

	private $chat_id;
	private $from_chat_id;
	private $disable_notification = false;
	private $message_id;

	/**
	 * @return View_Message
	 */
	public function execute()
	{
		$this->validate();

		$response = $this->call( $this->getParams() );
		if ( !$response->ok )
			$this->showError( $response );

		$message = new View_Message();
		$message->fromJson( $response->result );

		return $message;
	}

	/**
	 * @param int $chat_id
	 *
	 * @return $this
	 */
	public function setChatID( $chat_id )
	{
		if ( !is_numeric( $chat_id ) )
			die( 'Wrong $chat_id value' );

		$this->chat_id = intval( $chat_id );

		return $this;
	}

	/**
	 * @param int $from_chat_id
	 *
	 * @return $this
	 */
	public function setFromChatID( $from_chat_id )
	{
		if ( !is_numeric( $from_chat_id ) )
			die( 'Wrong $from_chat_id value' );

		$this->from_chat_id = intval( $from_chat_id );

		return $this;
	}

	/**
	 * @param bool $disable
	 *
	 * @return $this
	 */
	public function setDisableNotificationMode( $disable = false )
	{
		$this->disable_notification = !!$disable;

		return $this;
	}

	/**
	 * @param int $message_id
	 *
	 * @return $this
	 */
	public function setMessageID( $message_id )
	{
		if ( !is_numeric( $message_id ) )
			die( 'Wrong $message_id value' );

		$this->message_id = intval( $message_id );

		return $this;
	}

	/**
	 * @return string
	 */
	protected function getMethodName()
	{
		return 'forwardMessage';
	}

	private function validate()
	{
		if ( empty( $this->chat_id ) )
			die( 'set $chat_id before execute()' );
		if ( empty( $this->from_chat_id ) )
			die( 'set $from_chat_id before execute()' );
		if ( empty( $this->message_id ) )
			die( 'set $message_id before execute()' );
	}

	private function getParams()
	{
		return array (
			'chat_id'              => $this->chat_id,
			'from_chat_id'         => $this->from_chat_id,
			'disable_notification' => $this->disable_notification,
			'message_id'           => $this->message_id,
		);
	}

}