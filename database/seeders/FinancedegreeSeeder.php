<?php

namespace Database\Seeders;

use App\Models\DisBonesRole;
use App\Models\FinanceDegree;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class FinancedegreeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $id_deduct=DisBonesRole::where('dis_title','=','general_deduct_role')->value('id');
        $financedegree=FinanceDegree::create([

            'fin_title'=>strtolower('general_degree'),
            'fin_descreption'=>strtolower('salary =0 LE'),
             'disrole_id'=>$id_deduct,
        ]);

    }
}
