<?php

namespace App\Exports\stores;

use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithHeadings;
use App\Models\stor_items\codelist_store_itms;
use Maatwebsite\Excel\Concerns\FromCollection;

class store_code_export implements FromCollection,  WithHeadings, WithMapping
{

    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        // You can use select() to limit the columns returned
        return codelist_store_itms::select( 'serial_numcla','ar_titlecla','En_titlecla','created_bycla')->get();
    }
       // Define the headers for the columns
    public function headings(): array
    {
        return [
'no',
            'serial',   // This is the header for the 'name' column
            'ar_title', // This is the header for the 'national id' column
            'en_title',// This is the header for the 'created' column
'created at'

        ];
    }
        // Map the data for each row
        public function map($request): array
        {
            return [
 $request->no,
                $request->serial_numcla,   // Column data for 'name'
                $request->ar_titlecla,   // Column data for 'national id'
                $request->En_titlecla,   // Column data for 'name'
                 $request->created_at,   // Column data for 'national id'

            ];
        }










}
