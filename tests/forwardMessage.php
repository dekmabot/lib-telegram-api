<?php
/**
 * Created by PhpStorm.
 * User: home
 * Date: 01.04.2016
 * Time: 13:30
 */

$token = '169619511:AAH3PXGWzAeFyAJwL8FKluckHyIveZGV-Ic';
$chat_id = 160425973;
$from_chat_id = 160425973;
$message_id = 6;

require_once( '../TelegramAPI/autoload.php' );

$telegram_api = new \TelegramAPI( $token );
$message = $telegram_api->methods->forwardMessage->setChatID( $chat_id )->setFromChatID( $from_chat_id )->setMessageID( $message_id )->execute();

print( '<pre>' );
print_r( $message );
exit();

