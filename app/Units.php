<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Units extends Model
{
    protected $table = 'r_units';
   	protected $primaryKey = 'id';

    protected $guarded = ['_token'];

    /**
     * Get the comments for the blog post.
     */
    public function sectors()
    {
        return $this->hasMany('App\Sectors');
    }
}
