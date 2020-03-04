<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Config extends Model
{
    protected $table = 'tblconfig';
   	protected $primaryKey = 'strchave';

    protected $guarded = ['_token'];
}
