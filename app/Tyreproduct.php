<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tyreproduct extends Model
{
    protected $table = 'tyreproducts';
    protected $fillable = [
    	'category','model', 'size', 'cost', 'amount', 'year', 'promotion', 'comment', 'master_id', 'admin_id',

    ];
    protected $primaryKey = 'id';
}
