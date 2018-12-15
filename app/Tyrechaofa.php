<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tyrechaofa extends Model
{
    protected $table = 'tyrechaofas';
    protected $fillable = [
    	'category','model', 'size', 'cost', 'amount', 'year', 'promotion', 'comment', 'master_id', 'admin_id',

    ];
    protected $primaryKey = 'id';
}
