<?php
/**
 * Created by PhpStorm.
 * User: home
 * Date: 01.04.2016
 * Time: 13:30
 */

$token = '169619511:AAH3PXGWzAeFyAJwL8FKluckHyIveZGV-Ic';

$telegram_api = new \TelegramAPI\TelegramAPI( $token );
$user = $telegram_api->methods->getMe;

print('<pre>');
print_r( $user );
exit();