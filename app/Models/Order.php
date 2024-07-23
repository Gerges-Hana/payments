<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = ['total_price', 'status','transaction_id','transaction_status'];

    public function transactions()
    {
        return $this->hasMany(Transaction::class);
    }
}
