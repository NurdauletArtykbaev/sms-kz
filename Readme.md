# Пакет sms-kz для Laravel
Пакет sms-kz - это Laravel-пакет, который предоставляет интеграцию с к
азахстанскими SMS-провайдерами для отправки SMS-сообщений из ваших Laravel-приложений.

Установите пакет с помощью Composer:

``` bash
 composer require ваш-поставщик/sms-kz
```

## Конфигурация
После установки пакета, вам нужно опубликовать конфигурационный файл. Вы можете сделать это с помощью следующей команды:
``` bash
php artisan vendor:publish --tag=sms-kz-config
```

## Использование
Для отправки SMS-сообщений из вашего приложения, вы можете использовать фасад SmsKz. 
Вот пример:

```php
use Nurdaulet\KzSmsProvider\Facades\SmsKzFacade;
SmsKzFacade::to('phone')->text("message")->send();
```
