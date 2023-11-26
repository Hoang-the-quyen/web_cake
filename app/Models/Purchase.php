<?php

// app/Models/Purchase.php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Purchase extends Model
{
    protected $table = 'purchases';
    protected $fillable = ['product_id', 'quantity','name','phone','address','email','order_id']; 
}
