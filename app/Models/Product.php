<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    public $timestamps = false;

    protected $table = 'products'; // Tên của bảng trong cơ sở dữ liệu

    protected $primaryKey = 'product_id';
    protected $fillable = ['name', 'des', 'price', 'images','size','status','category_id','supplier_id']; 
}
