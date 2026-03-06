<?php

namespace App\Models;

use CodeIgniter\Model;

class CartItemModel extends Model
{
    protected $table = 'cart_items';
    protected $primaryKey = 'cartitem_id';

    protected $allowedFields = [
        'cart_id',
        'product_id',
        'quantity',
        'inCart',
        'order_id'
    ];

    protected $useTimestamps = false;
}