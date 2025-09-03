<?php

namespace Database\Seeders;

use App\Models\Roles;
use App\Models\DisBonesRole;
use App\Models\FinanceDegree;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class RolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $roles = Roles::create([
            "role_title"=>strtolower('super_admin'),
            "role_description"=>"full permission",

        ]);
        $roles = Roles::create([
            "role_title"=>strtolower('admin'),
            "role_description"=>"editor permission",

        ]);
        $roles = Roles::create([
            "role_title"=>strtolower('viewer'),
            "role_description"=>"viewer permission",

        ]);
         $roles = Roles::create([
            "role_title"=>strtolower('store_admin'),
            "role_description"=>"stores mangment permission",

        ]);
          $roles = Roles::create([
            "role_title"=>strtolower('library_admin'),
            "role_description"=>"library permission",

        ]);
        $roles = Roles::create([
            "role_title"=>strtolower('roll_payment_admin'),
            "role_description"=>"roll payment permission",

        ]);
        $deduct_role= DisBonesRole::create([

            'dis_title'=>strtolower('general_deduct_role'),
            'dis_descreption'=>strtolower('deduct or allowence =0%'),
        ]);

    }
}
