<?php

namespace App\Models;

use Illuminate\Contracts\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\Pivot;

class circulation extends Pivot
{

    public $casts = [
        'arrived_at' => 'date',
        'recorded_data' => 'array',
        'processed_data' => 'array'
    ];


    public function receiver():BelongsTo
    {
        return $this->belongsTo(Service::class,'receiver_id');
    }


}
