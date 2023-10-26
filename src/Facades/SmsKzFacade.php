<?php

namespace  Nurdaulet\KzSmsProvider\Facades;

use Illuminate\Support\Facades\Facade;

class SmsKzFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'sms_kz_service';
    }
}
