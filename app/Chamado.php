<?php

namespace App;

use Illuminate\Notifications\Notifiable; 
use Illuminate\Database\Eloquent\Model;

class Chamado extends Model
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'titulo', 'equipamento', 'problema', 'observacao', 'user_id', 'status',
    ];

    public function user(){
        return $this->belongsTo('App\User');
    }

}
