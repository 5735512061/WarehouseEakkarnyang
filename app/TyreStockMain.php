<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TyreStockMain extends Model
{
    protected $table = 'tyre_stock_mains';
    protected $fillable = [
    	'category','model', 'size', 'cost', 'amount', 'dot', 'master_id', 'admin_id', 'stock', 'year',

    ];
    protected $primaryKey = 'id';
}
