<?php
namespace TelegramAPI;

class Methods_Method_GetMe extends Methods_Method
{

	/**
	 * Methods_Method_GetMe constructor.
	 *
	 * @param Methods_Factory $factory
	 */
	public function __construct( Methods_Factory $factory )
	{
		parent::__construct( $factory );

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