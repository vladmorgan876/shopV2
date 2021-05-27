<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $fillable = [
        'username',
        'email',
        'productname',
        'productprice',
        'productquantity',
        'totalsum',
        'orderdate',
        'category',
        'status',
        'ordercompleted'

    ];
}
