<?php

namespace App\Models\library;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Itemchapters extends Model
{
    use HasFactory;
    protected $fillable = [
   'chapterno',
   'chapter_title',
   'chapter_part1',
   'chapter_part2',
   'chapter_part3',
   'chapter_part4',

   'item_id',
   'cover_imgpath',
   'file_name',
   'file_path',
   'visiblitych', //shown
   'lockch',
   'created_by',
   'edit_by',

    ];
}
