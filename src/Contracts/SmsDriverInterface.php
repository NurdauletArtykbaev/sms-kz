<?php

namespace Nurdaulet\KzSmsProvider\Contracts;

use Nurdaulet\KzSmsProvider\Sms;

interface SmsDriverInterface
{
    public function send(Sms $sms);
}
