<?php

namespace App\ORM;

use Illuminate\Database\Eloquent\Model;

class AfficheDetail extends Model
{
    protected $table = 'affiche_detail';
    protected $primaryKey = 'id';
    public $timestamps = false;
}
