<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Setor extends Model
{
    protected $table = 'tblsetor';
   	protected $primaryKey = 'intsetorid';

    protected $guarded = ['_token'];

    /**
     * Get the post that owns the comment.
     */
    public function polos()
    {
        return $this->belongsTo('App\Polo');
    }
}
