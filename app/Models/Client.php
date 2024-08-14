<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Laravel\Sanctum\HasApiTokens;
use Bavix\Wallet\Interfaces\Wallet;
use Bavix\Wallet\Traits\HasWalletFloat;

use Illuminate\Database\Eloquent\Model;
use Bavix\Wallet\Interfaces\WalletFloat;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Client extends Model implements Wallet, WalletFloat
{
    use HasFactory,HasApiTokens;
    use HasWalletFloat;
    use SoftDeletes;

    protected $guarded = ['id'];


    protected function type():Attribute
    {
        return Attribute::make(
            get: function ($value) {
                return match ($value) {
                    $value => __('models/clients.types.'.$value),
                    default => 'Unknown',
                };
            }
        );
    }
    public function flixy()
    {
        return $this->hasMany(Flixy::class);
    }

    public function meals()
    {
        return $this->hasMany(Meal::class);
    }

    public function lastmeal()
    {
        return $this->meals()->latest()->first();
    }

    public function scopeByDetails($query, $array)
    {
        return $query->whereIn('id', $array);
    }

}
