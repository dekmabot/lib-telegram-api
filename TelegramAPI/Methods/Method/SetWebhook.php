<?php
namespace TelegramAPI;

class Methods_Method_SetWebhook extends Methods_Method
{
	private $url;
	private $certificate;

	/**
	 * @return View_Response
	 */
	public function execute()
	{
		$this->validate();

		$response = $this->call( $this->getParams() );
		if ( !$response->ok )
			$this->showError( $response );

		return $response;
	}

	/**
	 * @param string $url
	 *
	 * @return $this
	 */
	public function setUrl( $url )
	{
		$this->url = $url;

		return $this;
	}

	/**
	 * @param string $certificate
	 *
	 * @return $this
	 */
	public function setCertificate( $certificate )
	{
		/* TODO: реализовать */

		return $this;
	}

	/**
	 * @return string
	 */
	protected function getMethodName()
	{
		return 'setWebhook';
	}

	private function validate()
	{
		return true;
	}

	private function getParams()
	{
		return array (
			'url' => $this->url,
		);
	}

}