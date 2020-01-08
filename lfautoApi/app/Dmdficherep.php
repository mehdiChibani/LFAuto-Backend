<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Dmdficherep extends Model
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'date', 'voiture','idMec','etat'
    ];

}
