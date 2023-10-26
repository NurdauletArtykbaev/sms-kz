<?php

namespace Nurdaulet\KzSmsProvider;

use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\ServiceProvider;
use Nurdaulet\KzSmsProvider\Contracts\SmsDriverInterface;
use Nurdaulet\KzSmsProvider\Drivers\SmscDriver;
use Nurdaulet\KzSmsProvider\Drivers\MobizonDriver;
use Nurdaulet\KzSmsProvider\Commands\SmsPublishCommand;

class SmsServiceProvider extends ServiceProvider
{
    public function boot()
    {
        if ($this->app->runningInConsole()) {
            $this->publishes([
                __DIR__ . '/../config/sms-kz.php' => config_path('sms-kz.php'),
            ],'sms-kz-config');

            $this->commands([
                SmsPublishCommand::class,
            ]);
            if (!file_exists(config_path('sms-kz.php'))) {
                Artisan::call('sms_kz:publish');
            }
        }
    }

    public function register()
    {
        $this->app->bind('sms_kz_service', SmsService::class);

        $this->bindDriver();
    }

    private function bindDriver()
    {
        $class = match (config('sms-kz.default')) {
            'mobizon' => MobizonDriver::class,
            default => SmscDriver::class,
        };

        $this->app->bind(SmsDriverInterface::class, $class);
    }
}
