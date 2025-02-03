<?php

namespace App\Models;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use null\Invoices2\App\discount_function;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Rollpayment extends Model
{
    use HasFactory;
    protected $fillable = ["pay_title","pay_date","payment_value","user_id",
    "discnt_role_id",
    "financ_id",
    "created_by",
    "edit_by",
    "total_after_add_dis",
    "total_after_reword",
    "total_after_dis",
    "serial_number",

];



}
