<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;

class Genre extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'genres';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
    ];


    public function Pivote(){

        return $this-> hasMany('App\Pivote');
    }
}
