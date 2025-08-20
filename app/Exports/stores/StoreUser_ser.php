<?php

namespace App\Exports\stores;

use Maatwebsite\Excel\Concerns\WithHeadings;
use App\Models\Storeloan_items;
use Maatwebsite\Excel\Concerns\FromCollection;

class StoreUser_ser implements FromCollection ,WithHeadings
{
   protected $results;

    public function __construct($results)
    {
        $this->results = $results;
    }

    public function collection()
    {
        return $this->results->map(function ($item) {
         return [
                'ID'=> $item->id,
                'title'=>$item->title_arai,
                'name'=>$item->name,
                'parteners'=>$item->parteners,
                'dep'=>$item->departmentis,

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
        return ['ID', 'title','name','parteners','dep','total_request' ,
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
