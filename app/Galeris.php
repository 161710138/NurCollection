<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Galeris extends Model
{
    protected $table='galeris';

    protected $fillable=['gambar','slug'];

    public $timestamps= true;
}