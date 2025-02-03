<?php

namespace App\Imports;

use App\Models\User;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\WithStartRow;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Concerns\ToModel;

use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;


class UsersImportUpdate implements ToCollection, WithHeadingRow

{

    public function startRow(): int
    {
        return 2;
    }

    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */

    public function collection(Collection $collection)
    {
        foreach ($collection as $row) {
            // Assuming 'id' is the primary key for the table
            // and you want to update 'value' column with the data from the file.
           User::where('email', $row['email'])
                ->update([
                    'national_id' => $row['national_id'], // Update based on your table's column names
                    // Add other fields as needed
                ]);
        }
    }
}
