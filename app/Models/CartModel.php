<?php

namespace App\Models;

use CodeIgniter\Model;

class CartModel extends Model
{
    protected $table = 'carts';
    protected $primaryKey = 'cart_id';

    protected $allowedFields = [
        'user_id'
    ];

    protected $useTimestamps = false;
}