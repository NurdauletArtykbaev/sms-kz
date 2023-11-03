<?php

namespace Nurdaulet\KzSmsProvider;

use Nurdaulet\KzSmsProvider\Facades\SmsKzFacade;
use Nurdaulet\KzSmsProvider\Jobs\SendSmsJob;

class Sms
{
    protected array $attributes = [];

    public function __construct($receiver = null, $message = null)
    {
        $this->attributes['receiver'] = $receiver;
        $this->attributes['message'] = $message;
    }

    public function to(string $to): self
    {
        $this->attributes['to'] = $to;

        return $this;
    }

    public function text(string $text):self
    {
        $this->attributes['text'] = $text;

        return $this;
    }

    public function send()
    {
        match (config('sms-kz.connection', 'sync')) {
            'queue' => SendSmsJob::dispatch($this)->onQueue('notification'),
            'sync'  => SmsKzFacade::send($this)
        };
    }

    public function toArray(): array
    {
        return $this->attributes;
    }

    public function __get($argument)
    {
        return $this->attributes[$argument] ?? null;
    }
}
