<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tyrephangnga extends Model
{
    protected $table = 'tyrephangngas';
    protected $fillable = [
    	'category','model', 'size', 'cost', 'amount', 'dot', 'master_id', 'admin_id', 'stock', 'year', 'stock_required'

    ];
    protected $primaryKey = 'id';
}
