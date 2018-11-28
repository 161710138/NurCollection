<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Barangs extends Model
{
    protected $table='barangs';

    protected $fillable=['id_kategoris','gambar','nama_barang','harga','deskripsi'];

    public $timestamps= true;

    public function kategoris()
    {
        return $this->belongsTo('App\Kategoris','id_kategoris');
    }

    public function getRouteKeyName()
    {
    	return 'slug';
    }
}