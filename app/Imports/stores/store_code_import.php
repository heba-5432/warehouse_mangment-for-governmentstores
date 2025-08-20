<?php

namespace App\Imports\stores;

use Maatwebsite\Excel\Concerns\WithStartRow;

use Illuminate\Support\Collection;

use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Concerns\ToModel;

use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use App\Models\stor_items\codelist_store_itms;

class store_code_import implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new codelist_store_itms([
            //
        ]);
    }
}
