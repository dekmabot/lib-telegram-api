<?php
namespace TelegramAPI;

class View_Photo extends View_Abstract
{
	public $name;
	public $type;
	public $tmp_name;
	public $error;
	public $size;

	public function fromJson( $data )
	{
		print('Photo:<pre>');
		print_r( $data );
		exit();
	}

	/* TODO: реализовать */
}