<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Facades\DB;

class Meal extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $guarded = ['id', 'created_at', 'updated_at'];

    public function client()
    {
        return $this->belongsTo(Client::class, 'client_id', 'id');
    }

    public function resto()
    {
        return $this->belongsTo(Resto::class, 'resto_id', 'id');
    }

    public function mealType()
    {
        return $this->belongsTo(MealType::class, 'meal_type', 'id');
    }

    public function scopeByMealsPerDate($query, $date)
    {
        return $query->whereDate('meals.created_at', '=', DATE($date));
    }

    public function scopeByMealsPerResto($query, $resto_id)
    {
        return $query->where('resto_id', $resto_id);
    }

    public function scopeByMealsPerType($query, $meal_type_id)
    {
        return $query->where('meal_type', $meal_type_id);
    }

    public function scopeByMealsPerDou($query, $dou_code)
    {
        return $query->select('*')
                            ->join('restos', 'restos.id', '=', 'meals.resto_id')
                            ->where('restos.dou_code', $dou_code);

    }

    public function scopeByMealsGroupByResto($query, $dou_code)
    {
        return $query->select(DB::raw('DATE(meals.created_at) as create_date'),
                                        //DB::raw('count(*) as count'),
                                        'restos.name as resto',
                                        'meal_types.name'
                                        )
                            ->join('restos', 'restos.id', '=', 'meals.resto_id')
                            ->join('meal_types', 'meal_types.id', '=', 'meals.meal_type')
                            ->where('restos.dou_code', $dou_code)
                            ->groupBy(['resto_id', 'meal_types.id', 'create_date', 'restos.name','meal_types.name'])
                            ->orderBy('create_date', 'desc');
    }



}
