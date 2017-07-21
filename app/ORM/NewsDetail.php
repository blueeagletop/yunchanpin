<?php

namespace App\ORM;

use Illuminate\Database\Eloquent\Model;

class NewsDetail extends Model
{
    protected $table = 'news_detail';
    protected $primaryKey = 'id';
    public $timestamps = false;
}
