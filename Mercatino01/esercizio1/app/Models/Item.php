<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    use HasFactory;
    protected $fillable = ['type', 'price', 'status'];

    public function customers()
    {
        return $this->belongsToMany(Customer::class, 'customer_items');
    }
}
