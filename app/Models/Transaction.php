<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    //
    protected $fillable = [
        'customer_id',
        'total_harga',
        
    ];
    public function customer() {
        return $this->belongsTo(Customer::class);
    }
    
    public function details() {
        return $this->hasMany(TransactionDetail::class);
    }
    
}
