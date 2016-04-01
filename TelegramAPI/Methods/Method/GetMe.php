<?php
namespace TelegramAPI;

class Methods_Method_GetMe extends Methods_Method
{

	/**
	 * @return View_User
	 */
	public function execute()
	{
		$response = $this->call();
		if ( !$response->ok )
			$this->showError( $response );

		$user = new View_User();
		$user->fromJson( $response->result );

		return $user;
	}

	protected function getMethodName()
	{
		return 'getMe';
	}

}