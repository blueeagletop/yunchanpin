<?php

namespace App\ORM;

use Illuminate\Database\Eloquent\Model;

class HomeNav extends Model
{
    protected $table = 'home_nav';
    protected $primaryKey = 'id';
    public $timestamps = false;
}
