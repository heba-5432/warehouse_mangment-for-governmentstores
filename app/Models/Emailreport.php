<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Emailreport extends Model
{
    use HasFactory;
    protected $fillable = [
        'emdate',
    'emstatus',
    'emuser_id',
    'emuser_national',


];
}
