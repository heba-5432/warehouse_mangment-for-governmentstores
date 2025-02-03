<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DisBonesRole extends Model
{
    use HasFactory;
    protected $fillable =
    [
        "dis_title", "dis_descreption","total_dis","total_bones","created_by","edit_by"
    ];
}
