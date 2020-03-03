<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sectors extends Model
{
    protected $table = 'sectors';
   	protected $primaryKey = 'id';

    protected $guarded = ['_token'];

    /**
     * Get the post that owns the comment.
     */
    public function unit()
    {
        return $this->belongsTo('App\Units');
    }
}
