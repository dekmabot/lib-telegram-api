<?php
namespace TelegramAPI;

class Methods_Method_SendPhoto extends Methods_Method
{
	const MODE_HTML = 'HTML';
	const MODE_MARKDOWN = 'Markdown';

	private $chat_id;
	private $photo;
	private $caption;
	private $disable_notification = false;
	private $reply_to_message_id;
	private $reply_markup;

	private $is_photo = false;

	/**
	 * @return View_Message
	 */
	public function execute()
	{
		$this->validate();

		$response = $this->call( $this->getParams(), true );
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
	 * @param string $absolute_filename_path
	 *
	 * @return $this
	 */
	public function setPhotoByPath( $absolute_filename_path )
	{
		$this->transport->addFile( 'photo', $absolute_filename_path );

		$this->photo = array(
			
		);
		$this->is_photo = true;

		return $this;
	}

	/**
	 * @param View_Photo $photo
	 *
	 * @return $this
	 */
	public function setPhotoByID( View_Photo $photo )
	{
		/* TODO: реализовать */

		return $this;
	}

	/**
	 * @param string $caption
	 *
	 * @return $this
	 */
	public function setCaption( $caption )
	{
		$this->caption = $caption;

		return $this;
	}

	/**
	 * @param bool $disable
	 *
	 * @return $this
	 */
	public function setDisableNotification( $disable = false )
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
		return 'sendPhoto';
	}

	private function validate()
	{
		if ( empty( $this->chat_id ) )
			die( 'set $chat_id before execute()' );
		if ( !$this->is_photo )
			die( 'set $photo before execute()' );
	}

	private function getParams()
	{
		return array (
			'chat_id'              => $this->chat_id,
			'caption'              => $this->caption,
			'disable_notification' => $this->disable_notification,
			'reply_to_message_id'  => $this->reply_to_message_id,
			'reply_markup'         => $this->reply_markup,
		);
	}

}