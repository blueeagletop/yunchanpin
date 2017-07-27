<?php

namespace App\ORM;

use Illuminate\Database\Eloquent\Model;

class NewsCategory extends Model
{
    protected $table = 'news_category';
    protected $primaryKey = 'id';
    public $timestamps = false;
}
