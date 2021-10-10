<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Invoice_details extends Model
{
    use HasFactory;
    protected $table="invoice_details";
    protected $fillable=[
        'invoice_id',
        'status',
        'payment_date',
        'user_id'
    ];
}
