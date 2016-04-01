<?php
/**
 * Created by PhpStorm.
 * User: home
 * Date: 01.04.2016
 * Time: 13:30
 */

$token = '169619511:AAH3PXGWzAeFyAJwL8FKluckHyIveZGV-Ic';
$chat_id = 160425973;
$message = 'Hello, World!';

require_once( '../TelegramAPI/autoload.php' );

$telegram_api = new \TelegramAPI( $token );

$message = $telegram_api->methods->sendMessage
	->setChatID( $chat_id )
	->setText( $message )
	->execute();

print( '<pre>' );
print_r( $message );
exit();

