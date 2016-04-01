<?php
namespace TelegramAPI;

class View_Chat extends View_Abstract
{
	public $id;
	public $first_name;
	public $last_name;
	public $type;

	public function fromJson( $data )
	{
		$this->id = $data->id;
		$this->first_name = $data->first_name;
		$this->last_name = $data->last_name;
		$this->type = $data->type;
	}
}