<?php

namespace App\Exports;

use App\Models\User;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class UsersExport implements FromCollection,  WithHeadings, WithMapping
{
    // Get the collection of users, or modify it for your data
    public function collection()
    {
        // You can use select() to limit the columns returned
        return User::select( 'name','national_id','created_at')->get();
    }
       // Define the headers for the columns
    public function headings(): array
    {
        return [

            'Name',   // This is the header for the 'name' column
            'national id', // This is the header for the 'national id' column
            'created at',// This is the header for the 'created' column
        ];
    }
        // Map the data for each row
        public function map($user): array
        {
            return [

                $user->name,   // Column data for 'name'
                $user->national_id,   // Column data for 'national id'
                $user->created_at,   // Column data for 'name'

            ];
        }


}
