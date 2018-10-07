<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;

class Film extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'films';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'description', 'realease_date','rating', 'country', 'ticket_price','photo',
    ];


    public function comments()
    {
        return $this->hasMany('App\Comment');
    }

}
