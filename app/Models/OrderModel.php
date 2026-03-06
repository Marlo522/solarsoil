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
        'created_at',
        'isCompleted'
    ];

    protected $useTimestamps = false;
}