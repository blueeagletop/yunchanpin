<?php

namespace App\ORM;

use Illuminate\Database\Eloquent\Model;

class OrderCategory extends Model
{
    protected $table = 'order_category';
    protected $primaryKey = 'id';
    public $timestamps = false;
}
