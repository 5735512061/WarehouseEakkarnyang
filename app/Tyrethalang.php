<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tyrethalang extends Model
{
    protected $table = 'tyrethalangs';
    protected $fillable = [
    	'category','model', 'size', 'cost', 'amount', 'year', 'promotion', 'comment', 'master_id', 'admin_id',

    ];
    protected $primaryKey = 'id';
}
