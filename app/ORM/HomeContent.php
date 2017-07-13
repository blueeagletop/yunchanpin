<?php

namespace App\ORM;

use Illuminate\Database\Eloquent\Model;

class HomeContent extends Model
{
    protected $table = 'home_content';
    protected $primaryKey = 'id';
    public $timestamps = false;
}
