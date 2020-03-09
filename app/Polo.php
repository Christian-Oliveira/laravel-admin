<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Polo extends Model
{
    protected $table = 'tblpolo';
   	protected $primaryKey = 'intpoloid';

    protected $guarded = ['_token'];

    /**
     * Get the comments for the blog post.
     */
    public function setores()
    {
        return $this->hasMany('App\Setor', 'idpolo');
    }
}
