<?php
/**
 * Created by PhpStorm.
 * User: home
 * Date: 01.04.2016
 * Time: 13:30
 */

$token = '169619511:AAH3PXGWzAeFyAJwL8FKluckHyIveZGV-Ic';
$url = 'https://mydomain.ru';

require_once( '../TelegramAPI/autoload.php' );

$telegram_api = new \TelegramAPI( $token );

$response = $telegram_api->methods->setWebhook->setUrl( $url )->execute();

print( '<pre>' );
print_r( $response );

$response = $telegram_api->methods->setWebhook->setUrl( '' )->execute();

print( '<pre>' );
print_r( $response );

exit();

