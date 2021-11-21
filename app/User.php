<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'nome_empresa', 'nome_setor', 'role', 'created_at', 'updated_at',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function chamado(){
        return $this->hasMany('App\Chamado');
    }

    //data formatada m-d-Y (criação)
    protected $appends = ['data'];
    public function getDataAttribute()
    {
        return date('d/m/Y h:m', strtotime($this->attributes['created_at']));
    }

    //data formatada m-d-Y (atualização)
    protected $appendss = ['data2'];
    public function getData2Attribute()
    {
        return date('d/m/Y h:m', strtotime($this->attributes['updated_at']));
    }
}
