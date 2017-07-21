<?php

namespace App\ORM;

use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    protected $table = 'news';
    protected $primaryKey = 'id';
}
