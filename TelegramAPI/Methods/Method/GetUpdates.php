<?php
namespace TelegramAPI;

class Methods_Method_GetUpdates extends Methods_Method
{
	/**
	 * @return View_Update[]
	 */
	public function execute()
	{
		$this->validate();

		$response = $this->call( $this->getParams() );
		if ( !$response->ok )
			$this->showError( $response );

		$updates = array ();
		foreach ( $response->result as $update )
		{
			$updates[] = new View_Update( $update );
		}

		return $updates;
	}

	/**
	 * @return string
	 */
	protected function getMethodName()
	{
		return 'getUpdates';
	}

	private function validate()
	{
		return true;
	}

	private function getParams()
	{
		return array ();
	}

}