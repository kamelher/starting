<?php

namespace App\Models;

use Bavix\Wallet\Interfaces\Wallet;
use Bavix\Wallet\Interfaces\WalletFloat;
use Bavix\Wallet\Traits\HasWalletFloat;
use Illuminate\Database\Eloquent\Attributes\ScopedBy;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Laravel\Sanctum\HasApiTokens;

#[ScopedBy([Scopes\vendeur\vendeurScope::class])]
class Vendeur extends Model implements Wallet, WalletFloat
{
    use HasFactory,HasApiTokens;
    use SoftDeletes;
    use HasWalletFloat;

    protected $hidden = [
        'password',
    ];

    public function flixy()
    {
        return $this->hasMany(Flixy::class);
    }

    public function resto()
    {
        return $this->belongsTo(Resto::class , 'resto_id', 'id');
    }

    public function dou_code()
    {
        return $this->resto()->dou_code;
    }
    public function scopeDou($query, $dou_code)
    {
        return $query->whereIn('resto_id', Resto::select('id')->where('dou_code', $dou_code));
    }
}
