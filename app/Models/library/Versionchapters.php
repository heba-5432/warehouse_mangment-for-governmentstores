<?php

namespace App\Models\library;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Versionchapters extends Model
{
    use HasFactory;
    protected $fillable = [
        'chapternocv',
        'chapter_titlecv',
        'chapter_part1cv',
        'chapter_part2cv',
        'chapter_part3cv',
        'chapter_part4cv',

        'ver_id',
        'cover_imgpathcv',
        'file_namecv',
        'file_pathcv',
        'visiblitycv', //shown
        'lockcv',
        'created_by',
        'edit_by',

         ];
}
