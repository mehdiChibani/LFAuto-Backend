<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Paiment extends Model
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'prixPayee', 'idComptable','idClt','idDmd'
    ];

}
