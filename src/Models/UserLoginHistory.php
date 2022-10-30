<?php

namespace Xt\LoginHistory\Models;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserLoginHistory extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'ip_address',
        'user_agent',
        'region',
        'country',
        'lat',
        'lng',
        'response',
    ];

    /**
     * @var array
     */
    protected $casts = [
        'response' => 'json',
    ];

    public function getTable(): string
    {
        if ((string) $this->table === '') {
            $this->table = config('login-history.history.table', 'user_login_histories');
        }

        return parent::getTable();
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
