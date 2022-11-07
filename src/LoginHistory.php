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

    public static function isMobileDevice($agent) {
        return preg_match("/(android|avantgo|blackberry|bolt|boost|cricket|docomo
|fone|hiptop|mini|mobi|palm|phone|pie|tablet|up\.browser|up\.link|webos|wos)/i"
            , $agent);
    }
}
