<?php
namespace TelegramAPI;

class View_Photo_Size extends View_Abstract
{
	public $file_id;
	public $file_size;
	public $width;
	public $height;

	public function __construct( $data )
	{
		$this->file_id = $data->file_id;
		$this->file_size = $data->file_size;
		$this->width = $data->width;
		$this->height = $data->height;
	}
}