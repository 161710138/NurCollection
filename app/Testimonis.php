<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Testimonis extends Model
{
    protected $table='testimonis';

    protected $fillable=['nama','gambar','testimoni','slug'];

    public $timestamps= true;
}