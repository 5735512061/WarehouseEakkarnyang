<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tyrebypart extends Model
{
    protected $table = 'tyrebyparts';
    protected $fillable = [
    	'category','model', 'size', 'cost', 'amount', 'year', 'promotion', 'comment', 'master_id', 'admin_id',

    ];
    protected $primaryKey = 'id';
}
