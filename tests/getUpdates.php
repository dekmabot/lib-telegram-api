<?php
/**
 * Created by PhpStorm.
 * User: home
 * Date: 01.04.2016
 * Time: 13:30
 */

$token = '169619511:AAH3PXGWzAeFyAJwL8FKluckHyIveZGV-Ic';

require_once( '../TelegramAPI/autoload.php' );

$telegram_api = new \TelegramAPI( $token );

$updates = $telegram_api->methods->getUpdates->execute();

print( '<pre>' );
print_r( $updates );
exit();

