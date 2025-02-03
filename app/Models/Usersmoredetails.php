<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Usersmoredetails extends Model
{
    use HasFactory;


    protected $fillable = [
        'user_idf',
        'descrption',
        'files_path',
        'file_name',
        'profil_impath',
        'national_p_id',

    ];
    protected $casts = [
        'cv_filepath' => 'array',
    ];

}
