<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Periode extends Model
{
    protected $table = 'periode';
    protected $guarded = ['created_at', 'updated_at'];
    public $timestamps = true;
    protected $primaryKey = 'id_periode';

    public function group(){
        return $this->hasMany('App\Group','id_periode','id_periode') ;
    }
    public function daftarpenilaianpenguji(){
        return $this->hasMany('App\DaftarPenilaianPenguji','id_periode','id_periode') ;
    }
    public function ListNilaiAkhir(){
        return $this->belongsTo('App\ListNilaiAkhir','id_periode','id_periode') ;
    }
}
