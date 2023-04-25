<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Plank\Mediable\Mediable;

class Mail extends Model
{
    use HasFactory;
    use Mediable;

    public $table = 'mails';
    //TODO: Add Expediter to mail as VarChar 4049
    public $fillable = [
        'objet',
        'ref',
        'body',
    ];

    protected $casts = [
        'id' => 'integer',
        'objet' => 'string',
        'ref' => 'string',
        'body' => 'string',
        'Expediter' => 'string',
    ];

    public static array $rules = [
        'objet' => 'required',
        'ref' => 'nullable',
    ];

    protected $field = [
        'arrived_at',
        'arrived_data',
        'receiver_id',
        'recorded_at',
        'recorded_data',
        'record_number',
        'processed_at',
        'processed_data',
        'processed_orientations',
        'sent_at',
        'sent_to',
        'sent_number',
        'sender_id',
        'arrived_from',
        'reference_number'
    ];

    public function registers()
    {
        return $this->belongsToMany(Register::class)
            ->withPivot($this->field)
            ->using(circulation::class)
            ->withTimestamps();
    }

    public function actualregister($value)
    {
        return $this->belongsToMany(Register::class)
            ->withPivot($this->field)
            ->where('receiver_id',$value)
            ->withTimestamps();
    }


}

