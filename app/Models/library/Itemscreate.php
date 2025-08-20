<?php

namespace App\Models\library;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Itemscreate extends Model
{
    use HasFactory;
    protected $fillable = [
        'title_ara',
         'title_eng',
        'profil_impath',
        'files_path',
         'auther1',
         'coauther2',
         'coauther3',
         'coauther4',
         'coauther5',
         'barcode_number',
         'introduction',
         'summery',
         'location',
         'copies_number',

         'catogery_id',
         'catogery2_id',
         'locked',
         'visible',
         'keyword_id',   // array
         'store_owner_id',
        'created_by',
        'edit_by',

        ];
}
