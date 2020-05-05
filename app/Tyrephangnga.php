<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tyrephangnga extends Model
{
    protected $table = 'tyrephangngas';
    protected $fillable = [
    	'category','model', 'size', 'cost', 'amount', 'year', 'promotion', 'comment', 'master_id', 'admin_id',

    ];
    protected $primaryKey = 'id';
}
