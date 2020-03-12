<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Config extends Model
{
    protected $table = 'tblconfig';
    protected $primaryKey = 'strchave';
    public $timestamps = false;

    protected $guarded = ['_token'];
}
