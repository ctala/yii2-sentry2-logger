Sentry2 Logger for Yii2
=======================
Sentry2 Logger for Yii2

Installation
------------

The preferred way to install this extension is through [composer](http://getcomposer.org/download/).

Either run

```
php composer.phar require  ctala/yii2-sentry2-logger
```


Usage
-----

Once the extension is installed, simply use it in your code by  :

```php
        'log' => [
            'targets' => [
                [
                    'class' => 'ctala\Sentry2\SentryTarget',
                    'levels' => ['error'],
                    'dsn' => "YOURDSN",
                    'environment' => "prod"

                ],
            ],
        ],
```