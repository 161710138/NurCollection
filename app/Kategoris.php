<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class kategoris extends Model
{
    protected $table='kategoris';

    protected $fillable=['nama_kategori'];

    public $timestamps= true;

    public function barangs()
    {
        return $this->hasOne('App\Barangs','id_barangs');
    }
}

