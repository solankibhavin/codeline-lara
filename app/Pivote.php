<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;

class Pivote extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'pivotes';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'film_id','genre_id',
    ];

    public function Film(){

        return $this->belongsTo('App\Film');
    }

    public function Genre(){

        return $this-> belongsToMany('App\Genre');
    }
}
