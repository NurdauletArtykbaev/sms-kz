<?php

return [
    'default' => 'smsc',
    'connection' => env('SMS_CONNECTION', 'sync'),
    // sync or queue

    'drivers' => [
        'mobizon' => [
            'key' => env('MOBIZON_KEY', 'test'),
            'sender' => env('SMS_SENDER_NAME'),
        ],
        'smsc' => [
            'login' => env('SMS_SMSC_LOGIN', 'test'),
            'sender' => env('SMS_SENDER_NAME', 'test'),
            'password' => env('SMS_SMSC_PASSWORD', 'password'),
        ]
    ],
];
