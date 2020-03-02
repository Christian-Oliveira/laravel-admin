<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Units extends Model
{
    protected $table = 'r_units';
   	protected $primaryKey = 'id';

    protected $guarded = ['_token'];
}
