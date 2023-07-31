<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tyrebypart extends Model
{
    protected $table = 'tyrebyparts';
    protected $fillable = [
    	'category','model', 'size', 'cost', 'amount', 'dot', 'master_id', 'admin_id', 'stock', 'year',

    ];
    protected $primaryKey = 'id';
}
