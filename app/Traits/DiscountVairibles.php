<?php

declare(strict_types=1);

namespace null\Invoices2\App\Traits;

use App\Models\Rollpayment;

trait DiscountVairibles
{
    public $number;
    public $percentage_dis;
    public $percentage_bones;
    public $id2;

    public function __construct($number,$percentage_dis,$percentage_bones,$id2)
{
    $this->number = $number;
    $this->percentage_dis= $percentage_dis;
    $this->percentage_bones = $percentage_bones;
    $this->id2 = $id2;



        $amount_dis= ($this->number * $this->percentage_dis) / 100;
        $totaldis=$this->number- $amount_dis;
        $amount_bones= ($this->number* $this->percentage_bones) /100;
        $totalbon=$this->number+ $amount_bones;
        $all_total=($this->number+$amount_bones-$amount_dis);


        Rollpayment:: where('serial_number',$this->id2)->update([
            'total_after_dis'=>$totaldis,
            'total_after_reword'=>$totalbon,
            'total_after_add_dis'=>$all_total,


        ]);
       // return [$totaldis , $totalbon,$all_total,$this->id2];
    }


}
