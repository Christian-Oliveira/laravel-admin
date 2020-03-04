<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Funcionario extends Authenticatable
{
    use Notifiable;

    protected $table = 'dbgeral.tblfuncionario';
    protected $primaryKey = 'idfuncionario';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'strnome', 'username', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function perfil()
    {
        return $this->belongsTo('App\Profiles', 'profile_id');
    }

    public function config()
    {
        return $this->belongsTo('App\Config');
    }
}
