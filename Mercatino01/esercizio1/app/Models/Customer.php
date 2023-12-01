<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $fillable = ['name', 'email'];
    use HasFactory;
    public function user()
    {
        return $this->belongsTo(User::class);
    }
   //ogni cliente può essere associato a più oggetti,
   //e ogni oggetto può essere associato a più clienti.
    public function items()
    {
        return $this->belongsToMany(Item::class, 'customer_items');
    }
}
