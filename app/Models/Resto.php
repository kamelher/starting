<?php

namespace App\Models;

use Bavix\Wallet\Interfaces\Wallet;
use Bavix\Wallet\Interfaces\WalletFloat;
use Bavix\Wallet\Traits\HasWalletFloat;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Laravel\Sanctum\HasApiTokens;

class Resto extends Model implements Wallet, WalletFloat
{
    use HasFactory,HasApiTokens;
    use SoftDeletes;
    use HasWalletFloat;
    use HasFactory;
    protected $fillable = [
        'name',
        'code',
        'password',
    ];
    protected $hidden = [
        'password',
    ];

    public function meals()
    {
        return $this->hasMany(Meal::class);
    }

    public function dfm()
    {
        return Dfm::where('dou_coude',$this->dou_code)->first();
    }


    public function vendeurs()
    {
        return $this->hasMany(Vendeur::class);
    }

    public function flixy()
    {
        return $this->hasMany(Flixy::class);
    }

    public function clients()
    {
        return $this->meals()->select('client_id')->groupBy('client_id')->distinct()->pluck('client_id')->toArray();
    }
}
