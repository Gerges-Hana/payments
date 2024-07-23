<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;
    use HasFactory;

    protected $fillable = ['transaction_id', 'amount', 'status', 'order_id'];

    public function order()
    {
        return $this->belongsTo(Order::class);
    }
}
