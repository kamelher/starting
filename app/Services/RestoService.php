<?php

namespace App\Services;


use App\Http\Resources\Client as ResourcesClient;
use App\Models\Meal;
use App\Models\MealType;
use App\Models\Price;
use Carbon\Carbon;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Redis;

class RestoService
{


    public array $columns = [
        1=>[
            1=>'breakfast',
            2=>'b_start',
            3=>'b_end'
        ],
        2=>[
            1=>'lunch',
            2=>'l_start',
            3=>'l_end'
        ],
        3=>[
            1=>'dinner',
            2=>'d_start',
            3=>'d_end'
        ]
    ];


    /**
     * @param $resto
     * @param $mealType
     * @param $meal_start
     * @param $meal_End
     * @return bool
     */
    public function isMealTime($resto, $mealType, $meal_start, $meal_End): bool
    {
        $currentHour = Carbon::now()->format('H:i:s');
        return $resto->$mealType && $currentHour < $resto->$meal_End && $currentHour > $resto->$meal_start;
    }


    /**
     * @param $client
     * retrun bool
     * true if the client is active
     */
    public function checkActiveClient($client): bool
    {
        return $client->active ;
    }
    /**
     * @param $client
     * @param $mealType
     * @return bool
     */
    public function checkClientLastMeal($client, $mealType): bool
    {
        $today = Carbon::now()->format('Y-m-d');

        if($client->lastmeal())
            return $client->lastmeal()->meal_type == $mealType && $client->lastmeal()->created_at->format('Y-m-d') == $today;
        return false;
    }


    /**
     * @param $client
     * @param $resto
     * @return bool true if the client is not in the same wilaya as the resto
     */

    public function checkWilaya($resto, $client):bool
    {
        return $resto->wilaya == $client->wilaya;
    }
    /**
     * @param $client
     * @param $mealType
     * @return bool true if the client is a resident
     */
    public function checkResidence($client, $mealType): bool
    {
        if(empty($client->id_residence) && (intval($mealType) !== 2)) return false;
        return  true;
    }

    /**
     * @param $client
     * @param $mealPrice
     * @return bool
     */
    public function checkBalance($client, $mealPrice): bool
    {
        return ($client->balanceFloat >= $mealPrice);
    }

    /*
     * @param $client from Client class
     * @param $mealType integer for the mealType code in the database
     * @return mealPrice
     */
    public function getMealPrice($client, $mealType)
    {
        return Price::where('meal_type', $mealType)->where('client_type', $client->type)->first()->price;
    }


    /**
     * @param $resto
     * @param $client
     * @param $mealPrice
     * @param $mealType
     * @return Response
     */
    public function takeMeal($resto, $client, $mealPrice, $mealType)
    {
        $pp = $mealPrice * 100;
        try {
            $trans = $client->forceWithdraw($pp, ['action' => 'get a ticket', 'admin_type' => 'resto', 'admin_id' => auth()->user()->id]);

            $meal = Meal::create(['resto_id' => $resto->id, 'meal_type' => $mealType, 'client_id' => $client->id, 'price' => $mealPrice, 'uuid' => $trans->uuid]);

            return response(['type' => $client->type, 'name' => $client->name,'card' => $client->card, 'code' => $client->code, 'balance' => $client->balanceFloat, 'message' => 'شهية طيبة'], 200);

        } catch (\Exception $e) {

            return response(['type' => $client->type, 'name' => $client->name, 'card' => $client->card, 'code' => $client->code, 'balance' => $client->balanceFloat, 'message' => $e->getMessage()], 500);

        }

    }

    /**
     * @returns integer
     */
    public function getOpenedMealType()
    {
        $currentHour = Carbon::now()->format('Y-m-d H:i:s');
        $currentDate = Carbon::now()->format('Y-m-d');
        $cachedMealType_endTime = Redis::get('mealType_endTime');
        if($currentHour>$cachedMealType_endTime)
            {
                Redis::del('mealType');
                Redis::del('mealType_endTime');
            }
        $cachedMealType = Redis::get('mealType');

            if(isset($cachedMealType))
                return $cachedMealType;
            else{
                $mealType =  MealType::where('start','<=', $currentHour)
                    ->where('end','>', $currentHour)
                    ->first();

                if($mealType) {
                    Redis::set('mealType',$mealType->code );
                    Redis::set('mealType_endTime',$currentDate.' '.$mealType->end );
                    return $mealType->code;
                }
            }
        return 0;
    }


    /*
     * @return error message
     */
    public function ErrorMessage($client, $message)
    {
        return response([ 'type' => $client->type, 'name' => $client->name, 'code' => $client->code, 'balance' => $client->balanceFloat,
            'message' => $message ], 200);
    }

    public function hundle($resto, $client, $mealType)
    {
        if($mealType==0)
            return $this->ErrorMessage($client, 'لا توجد وحبة مبرمجة في هذا الوقت');

        // check if the meal is in the meal time
        if(!$this->isMealTime($resto,$this->columns[$mealType][1],$this->columns[$mealType][2],$this->columns[$mealType][3]))
            return $this->ErrorMessage($client,'خارج اوقات تقديم الوجبات');

        // check if the client is active
        if(!$this->checkActiveClient($client))
            return $this->ErrorMessage($client, 'حسابك غير نشط');

        // check if the client is a resident when the wilaya is the same.
        if($this->checkWilaya($resto, $client))
            if(!$this->checkResidence($client, $mealType))
                return $this->ErrorMessage($client, 'لا يمكنك الحصول على الوجبة لانك غير مقيم');

        // check if the client has taken the meal
        if($this->checkClientLastMeal($client, $mealType))
            return $this->ErrorMessage($client, 'لقد قمت باستهلاك الوجبة مسبقا');

        // check if the client has enough balance
        $mealPrice = $this->getMealPrice($client, $mealType);
        if(!$this->checkBalance($client, $mealPrice))
            return $this->ErrorMessage( $client, 'رصيدك غير كافي الرجاء شحن حسابك');

        // take the meal
        return $this->takeMeal($resto, $client, $mealPrice, $mealType);

    }



}
