<?php

// app/Models/Purchase.php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Purchase extends Model
{
    protected $table = 'purchases';
    protected $fillable = ['product_id', 'quantity']; // Add other fillable fields as needed
}
