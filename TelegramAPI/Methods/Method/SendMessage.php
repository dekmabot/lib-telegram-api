<?php
namespace TelegramAPI;

class Methods_Method_SendMessage extends Methods_Method
{
	const MODE_HTML = 'HTML';
	const MODE_MARKDOWN = 'Markdown';

	private $chat_id;
	private $text;
	private $parse_mode = self::MODE_HTML;
	private $disable_web_page_preview = false;
	private $disable_notification = false;
	private $reply_to_message_id;

	/**
	 * @return View_Message
	 */
	public function execute()
	{
		$this->validate();

		$response = $this->call( $this->getParams() );
		if ( !$response->ok )
			$this->showError( $response );

		print('<pre>');
		print_r( $response );
		exit();

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
	 * @param string $text
	 *
	 * @return $this
	 */
	public function setText( $text )
	{
		$this->text = $text;

		return $this;
	}

	/**
	 * @param string $parse_mode
	 *
	 * @return $this
	 */
	public function setParseMode( $parse_mode )
	{
		if ( $parse_mode !== self::MODE_HTML && $parse_mode !== self::MODE_MARKDOWN )
			die( 'Wrong $parse_mode value' );

		$this->parse_mode = $parse_mode;

		return $this;
	}

	/**
	 * @param bool $disable
	 *
	 * @return $this
	 */
	public function setDisableLinkPreviewMode( $disable = false )
	{
		$this->disable_web_page_preview = !!$disable;

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
	 * @param int $id
	 *
	 * @return $this
	 */
	public function setReplyToMessageID( $id )
	{
		if ( !is_numeric( $id ) )
			die( 'Wrong $reply_to_message_id value' );

		$this->reply_to_message_id = intval( $id );

		return $this;
	}

	/**
	 * @param $reply
	 *
	 * @return $this
	 */
	public function setReplyMarkup( $reply )
	{
		/* TODO: реализовать */

		return $this;
	}

	/**
	 * @return string
	 */
	protected function getMethodName()
	{
		return 'sendMessage';
	}

	private function validate()
	{
		if ( empty( $this->chat_id ) )
			die( 'set $chat_id before execute()' );
		if ( empty( $this->text ) )
			die( 'set $text before execute()' );
	}

	private function getParams()
	{
		return array (
			'chat_id'                  => $this->chat_id,
			'text'                     => $this->text,
			'parse_mode'               => $this->parse_mode,
			'disable_web_page_preview' => $this->disable_web_page_preview,
			'disable_notification'     => $this->disable_notification,
			'reply_to_message_id'      => $this->reply_to_message_id,
		);
	}

}