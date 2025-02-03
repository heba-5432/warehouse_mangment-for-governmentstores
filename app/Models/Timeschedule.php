<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Timeschedule extends Model
{
    use HasFactory;
    protected $fillable = ["time_title",
     "time_day",
     "time_month",
     "time_year",
     "created_by",
     "edit_by",
     "start_date_t",
     "end_date_t",
    ];
}
