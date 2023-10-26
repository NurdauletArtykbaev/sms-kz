<?php

namespace Nurdaulet\KzSmsProvider\Drivers;

use Nurdaulet\KzSmsProvider\Contracts\SmsDriverInterface;
use Illuminate\Support\Facades\Http;
use Nurdaulet\KzSmsProvider\Sms;

class SmscDriver implements SmsDriverInterface
{
    protected $url = 'https://smsc.kz/sys/send.php';

    protected $login;
    protected $password;
    protected $senderName;

    public function __construct()
    {
        $this->login = config('sms-kz.drivers.smsc.login');
        $this->password = config('sms-kz.drivers.smsc.password');
        $this->senderName = config('sms-kz.drivers.smsc.sender');
    }

    public function send(Sms $sms)
    {
        Http::get($this->url, [
            'login'     => $this->login,
            'psw'       => $this->password,
            'phones'    => $sms->receiver,
            'sender'    => $this->senderName,
            'from'      => $this->senderName,
            'mes'       => $sms->text
        ]);
    }
}
