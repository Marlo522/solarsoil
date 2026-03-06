<?php

namespace App\Models;

use CodeIgniter\Model;

class ProductModel extends Model
{
    protected $table = 'products';
    protected $primaryKey = 'product_id';

    protected $allowedFields = [
        'image',
        'name',
        'price',
        'stock_quantity',
        'description',
        'category',
        'isDeleted',
        'date_added'
    ];

    protected $useTimestamps = false;
}