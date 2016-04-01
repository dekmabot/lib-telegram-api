<?php
namespace TelegramAPI;

class View_Photo extends View_Abstract
{
	public $size_90;
	public $size_320;
	public $size_800;
	public $size_1280;

	public function __construct( $data )
	{
		if ( isset( $data[0] ) )
			$this->size_90 = new View_Photo_Size( $data[0] );
		if ( isset( $data[1] ) )
			$this->size_320 = new View_Photo_Size( $data[1] );
		if ( isset( $data[2] ) )
			$this->size_800 = new View_Photo_Size( $data[2] );
		if ( isset( $data[3] ) )
			$this->size_1280 = new View_Photo_Size( $data[3] );
	}
}