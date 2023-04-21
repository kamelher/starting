<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use NunoMaduro\Collision\Adapters\Phpunit\TestResult;

class PermissionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /*
         * Permission Types
         *
         */
        $models = ['User', 'Action'];
        $Permissionitems = [];
        foreach ($models as $model){
            $Per = [
                [
                    'name'        => 'Can View '. Str::plural($model),
                    'slug'        => 'view.'.Str::lower(Str::plural($model)),
                    'description' => 'Can view '. Str::lower(Str::plural($model)),
                    'model'       => 'Permission',
                ],
                [
                    'name'        => 'Can Create '. Str::plural($model),
                    'slug'        => 'create.'.Str::lower(Str::plural($model)),
                    'description' => 'Can create new '. Str::lower(Str::plural($model)),
                    'model'       => 'Permission',
                ],
                [
                    'name'        => 'Can Edit '. Str::plural($model),
                    'slug'        => 'edit.'.Str::lower(Str::plural($model)),
                    'description' => 'Can edit '. Str::lower(Str::plural($model)),
                    'model'       => 'Permission',
                ],
                [
                    'name'        => 'Can Delete '. Str::plural($model),
                    'slug'        => 'delete.'.Str::lower(Str::plural($model)),
                    'description' => 'Can delete '. Str::lower(Str::plural($model)),
                    'model'       => 'Permission',
                ],
            ];

            $Permissionitems += $Per;
            dd($Permissionitems);
        }


        /*
         * Add Permission Items
         *
         */
        foreach ($Permissionitems as $Permissionitem) {
            $newPermissionitem = config('roles.models.permission')::where('slug', '=', $Permissionitem['slug'])->first();
            if ($newPermissionitem === null) {
                $newPermissionitem = config('roles.models.permission')::create([
                    'name'          => $Permissionitem['name'],
                    'slug'          => $Permissionitem['slug'],
                    'description'   => $Permissionitem['description'],
                    'model'         => $Permissionitem['model'],
                ]);
            }
        }
    }
}
