<?php

namespace Nurdaulet\KzSmsProvider;

use Nurdaulet\KzSmsProvider\Contracts\SmsDriverInterface;

class SmsService
{

    public function __construct(private SmsDriverInterface $driver)
    {
    }

    public function to(string $receiver = null): Sms
    {
        return new Sms($receiver);
    }

    public function __call($method, array $parameters = [])
    {
        return $this->driver->{$method}(...$parameters);
    }

}
