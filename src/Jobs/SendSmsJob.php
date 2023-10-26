<?php

namespace Nurdaulet\KzSmsProvider\Jobs;

use Nurdaulet\KzSmsProvider\Facades\SMS as SmsFacade;
use Nurdaulet\KzSmsProvider\Sms;
use Illuminate\Bus\Queueable;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class SendSmsJob
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected Sms $sms;

    public function __construct(Sms $sms)
    {
        $this->sms = $sms;
    }

    public function handle()
    {
        SmsFacade::send($this->sms);
    }
}
