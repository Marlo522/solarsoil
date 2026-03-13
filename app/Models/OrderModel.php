<?php

namespace App\Models;

use CodeIgniter\Model;

class OrderModel extends Model
{
    protected $table = 'orders';
    protected $primaryKey = 'order_id';

    protected $allowedFields = [
        'user_id',
        'cart_id',
        'shipping_method',
        'payment_method',
        'status',
        'created_at',
        'isCompleted',
        'total'
    ];

    protected $useTimestamps = false;
}