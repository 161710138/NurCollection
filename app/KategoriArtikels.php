<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class KategoriArtikels extends Model
{
    protected $table='kategori_artikels';

    protected $fillable=['nama_kategori'];

    public $timestamps= true;

    public function barangs()
    {
        return $this->hasOne('App\Artikels','id_artikels');
    }
}