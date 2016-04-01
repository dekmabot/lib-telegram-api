<?php
namespace TelegramAPI;

class View_Response extends View_Abstract
{
	public $ok;
	public $result;

	public $error_code;
	public $description;

	public function __construct( $data )
	{
		$this->ok = !!$data->ok;

		if ( isset( $data->result ) )
			$this->result = $data->result;
		if ( isset( $data->error_code ) )
			$this->error_code = intval( $data->error_code );
		if ( isset( $data->description ) )
			$this->description = $data->description;
	}
}