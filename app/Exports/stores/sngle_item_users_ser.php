<?php

namespace App\Exports\stores;

use App\Models\stor_items\Storeloan_items;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class sngle_item_users_ser implements FromCollection ,WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
     protected $results2;

    public function __construct($results2)
    {
        $this->results2 = $results2;
    }

    public function collection()
    {
        return $this->results2->map(function ($item) {
         return [
                'ID'=> $item->id,
 'title'=>$item->title_arai,
                'title_en'=>$item->title_engi,
                'owner'=>$item->name,
                'parteners'=>$item->parteners,
              'total_request'  =>$item->number_itemsi,
           'current_items_no'  => $item-> number_currentis,
           'date'=>$item->loan_date,
           'current_price'=>$item->used_price_item,
           'total_priceu'=>$item->total_prc,
                'request_name'=>$item->request_owneri,
                'description'=>$item->descriptioni,

                'barcodenumber'=>$item->barcode_numberi,
                'no'=>$item->items1_number,

                'notice'=>$item->noticeis,
                'price'=>$item->new_price,





                // Add more fields as needed
            ];
        });
    }
public function headings(): array
    {
        return ['ID',
 'title',
                'title_en',
                'owner',
                'parteners',
'total_request' ,
           'current_items_no'  ,
           'date',
           'current_price',
           'total_priceu',
                'request_name',
                'description',
                'barcodenumber',
                'no',
                'notice',
                'price',
    ];

    }
}
