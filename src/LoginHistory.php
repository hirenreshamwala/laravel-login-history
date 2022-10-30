<?php

namespace Xt\LoginHistory;

class LoginHistory
{
    public static function getIpInfo(string $ip)
    {
        $token = config('login-history.api_token');
        $data = file_get_contents('https://ipinfo.io/'.$ip.'?token='.$token);
        return json_decode($data, true);
    }
}
