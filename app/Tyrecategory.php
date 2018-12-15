<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tyrecategory extends Model
{
    protected $table = 'tyrecategories';
    protected $fillable = [
     'name',
    ];
    protected $primaryKey = 'id';
}

