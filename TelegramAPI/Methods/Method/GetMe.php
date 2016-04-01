<?php
namespace TelegramAPI;

class Methods_Method_GetMe extends Methods_Method
{

	public function getMe()
	{
		$response = $this->call();
		if ( !$response->ok )
			$this->showError( $response );

		$user = new View_User();
		$user->fromJson( $response->result );

		return $user;
	}

	public function getMethodName()
	{
		return 'getMe';
	}

}