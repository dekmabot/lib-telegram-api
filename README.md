README
======

Installation
------------

git:

```
sudo git clone https://github.com/dekmabot/lib-telegram-api.git
sudo mkdir lib-telegram-api/log
sudo chown -R www-data:www-data lib-telegram-api
sudo chmod -R 0775 lib-telegram-api

```

composer:

``` json
    {
        "require": {
            "dekmabot/lib-telegram-api": "dev-master"
        }
    }
```


Examples
-------------

``` php

// Get updates

$token = '<your bot token here>';
require_once( '../TelegramAPI/autoload.php' );
$telegram_api = new \TelegramAPI( $token );

$updates = $telegram_api->methods->getUpdates->execute();

// Send a message to a chat

$chat_id = '<chat id here>';
$message = 'Hello, World!';

$message = $telegram_api->methods->sendMessage
	->setChatID( $chat_id )
	->setText( $message )
	->execute();
```
