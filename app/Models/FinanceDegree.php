<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FinanceDegree extends Model
{
    use HasFactory;
    protected $fillable =
    [
        "fin_title", "fin_descreption","disrole_id","created_by","edit_by","salary","fin_ser",

"deduct2","deduct3","total_deduct","total_allow","total_after_deduct","total_after_allow","total_of_all",

"allow1","allow2","allow3","deduct1",
    ];
}
