<?php

declare(strict_types=1);

namespace Xt\LoginHistory\Traits;

use App\Models\User;
use Xt\LoginHistory\LoginHistory;
use Xt\LoginHistory\Models\UserLoginHistory;


/**
 * Trait HasLoginHistory.
 */
trait HasLoginHistory
{
    public function addLoginHistory(): void
    {
        if (!($this instanceof User)){
            return;
        }
        $user_agent = request()->server('HTTP_USER_AGENT');
        $user_ip = request()->ip();
        $ipInfo = LoginHistory::getIpInfo($user_ip);
        $region = $ipInfo['region'] ?? null;
        $country = $ipInfo['country'] ?? null;
        $lat = $ipInfo['lat'] ?? null;
        $lng = $ipInfo['lng'] ?? null;

        UserLoginHistory::create([
            'user_id' => $this->id,
            'ip_address' => $user_ip,
            'user_agent' => $user_agent,
            'region' => $region,
            'country' => $country,
            'lat' => $lat,
            'lng' => $lng,
            'response' => $ipInfo,
        ]);
    }
}
