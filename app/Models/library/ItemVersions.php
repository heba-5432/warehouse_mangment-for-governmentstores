<?php

namespace App\Models\library;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ItemVersions extends Model
{
    use HasFactory;
    protected $fillable=[

       'title_arav',
       'title_engv',
       'main_item_v1',
       'auther1v',
       'coauther2v',
       'coauther3v',
       'coauther4v',
       'coauther5v',
       'barcode_numberv',
       'introductionv',
       'summeryv',
       'locationv',
       'copies_numberv',
       'ver_impathv',

       'verfile_pathv',
       'catogery_idv',
       'catogery2_idv',
       'keyword_idv',
       'visiblev',
       'lockedv',
       'created_by',
       'edit_by',

    ];
}
