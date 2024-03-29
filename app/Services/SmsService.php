<?php

namespace App\Services;


class SmsService
{

    public static function sendSms($phone, $text, $priority = 2)
    {

        $client = new \GuzzleHttp\Client();
        $smsUrl = env('SMS_URL');
        $user = env('SMS_USERNAME');
        $password = env('SMS_PASSWORD');
        $smsTitle = env('SMS_TITLE');

        $providers = ['05' => 'ooredoo', '06' => 'mobilis', '07' => 'djezzy'];
        $smsc = $providers[substr($phone, 0, 2)];

        $params = [
            'query' => [
                'username' => $user,
                'password' => $password,
                'smsc' => $smsc,
                'charset' => 'utf8',
                'coding' => 2,
                'dlr-mask' => 31,
                'priority' => $priority,
                'from' => $smsTitle,
                'to' => '+213' . substr($phone, 1),
                'text' => $text
            ]
        ];

        $response = $client->request('GET', $smsUrl, $params);

        return $response;
    }
}
