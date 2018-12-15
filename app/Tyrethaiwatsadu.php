<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tyrethaiwatsadu extends Model
{
    protected $table = 'tyrethaiwatsadus';
    protected $fillable = [
    	'category','model', 'size', 'cost', 'amount', 'year', 'promotion', 'comment', 'master_id', 'admin_id',

    ];
    protected $primaryKey = 'id';
}
