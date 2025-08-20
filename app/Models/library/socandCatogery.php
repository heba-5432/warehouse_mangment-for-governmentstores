<?php

namespace App\Models\library;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class socandCatogery extends Model
{
    use HasFactory;
    protected $fillable = [
        'ar_title',
    'En_title',
    'created_by',
    'edit_by',
    'description',
    ];
}
