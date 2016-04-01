<?php
/**
 * Created by PhpStorm.
 * User: home
 * Date: 01.04.2016
 * Time: 13:30
 */

$token = '169619511:AAH3PXGWzAeFyAJwL8FKluckHyIveZGV-Ic';
$chat_id = 160425973;
$file_path = __DIR__ . '/test_photo.jpg';
$caption = 'Test photo';

require_once( '../TelegramAPI/autoload.php' );

$telegram_api = new \TelegramAPI( $token );

$messages = $telegram_api->methods->getUpdates->execute();

print( '<pre>' );
print_r( $messages );
exit();

