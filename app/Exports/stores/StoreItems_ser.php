<?php

namespace App\Exports\stores;

use App\Models\store_items;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
class StoreItems_ser implements FromCollection ,WithHeadings
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
'catogery'=>$item->ar_titlec,
                 'type'=>$item->ar_titles2,
                'seller'=>$item->seller_infoi,
                'request_name'=>$item->request_owneri,
                'description'=>$item->descriptioni,
                'store_location'=>$item->locationi,
                'barcodenumber'=>$item->barcode_numberi,
                'no'=>$item->items1_number,

                'notice'=>$item->notice,
                'items_no'=>$item->qauntatyi,
                'items_curr_no'=>$item->current_qauntaty,
                'data_wstored'=>$item->add_datei,
                'price'=>$item->new_price,
                'total_price'=>$item->total_pricen,
                'curr_total_price'=>$item->current_total_pricen,



                // Add more fields as needed
            ];
        });
    }
public function headings(): array
    {
        return ['ID',
 'title',
                'title_en',
'catogery',
                 'type',
                'seller',
                'request_name',
                'description',
                'store_location',
                'barcodenumber',
                'no',
                'notice',
                'items_no',
                'items_curr_no',
                'data_wstored',
                'price',
                'total_price',
                'curr_total_price',];
    }

}
