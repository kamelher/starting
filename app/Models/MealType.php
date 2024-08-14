<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
 use Illuminate\Database\Eloquent\Factories\HasFactory;
class MealType extends Model
{
    use HasFactory;    public $table = 'meal_types';

    public $fillable = [
        'name',
        'code',
        'start',
        'end'
    ];

    protected $casts = [
        'name' => 'string',
        'code' => 'string'
    ];

    public static array $rules = [
        'name' => 'required|string|max:255',
        'code' => 'required|string|max:255',
        'start' => 'required',
        'end' => 'required',
        'created_at' => 'nullable',
        'updated_at' => 'nullable',
        'deleted_at' => 'nullable'
    ];

    
}
