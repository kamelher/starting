<?php

namespace App\Models;

use Illuminate\Contracts\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Relations\Pivot;

class circulation extends Pivot
{

    public $casts = [
        'arrived_at' => 'date',
        'recorded_data' => 'array'
    ];




}
