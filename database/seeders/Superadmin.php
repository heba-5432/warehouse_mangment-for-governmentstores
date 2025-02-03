<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Roles;
use App\Models\DisBonesRole;
use App\Models\FinanceDegree;
use Illuminate\Database\Seeder;
use Illuminate\support\facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class Superadmin extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
       $Id= Roles::where('role_title','=','super_admin')->value('id');



       $id_degree=FinanceDegree::where('fin_title','=','general_degree')->value('id');



        User:: create([
            'name'=>'hebaa',
            'email'=>'h.karim@mcomm.cu.edu.eg',
            'email_verified_at'=>'2013-08-30 19:05:00',
            'password'=>Hash::make('hebapas'),
            'role_id'=>$Id,
            'position_id'=> $id_degree,
        ]);
    }
}
