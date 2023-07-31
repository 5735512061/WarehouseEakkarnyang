<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tyreproduct extends Model
{
    protected $table = 'tyreproducts';
    protected $fillable = [
    	'category','model', 'size', 'cost', 'amount', 'dot', 'master_id', 'admin_id', 'stock', 'year',

    ];
    protected $primaryKey = 'id';
}
