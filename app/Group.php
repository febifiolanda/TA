<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    
    protected $table ='kelompok';
    
    public function laporan(){
        return $this->hasMany('App\Laporan','id_kelompok','id_kelompok') ;
    }
    public function periode(){
        return $this->belongsTo('App\Periode','id_periode','id_periode') ;
    }
    public function dosen(){
        return $this->belongsTo('App\Profile','id_dosen','id_dosen') ;
    }
    public function detailGroup(){
        return $this->hasMany('App\DetailGroup','id_kelompok','id_kelompok') ;
    }
    public function DaftarNilaiAkhir(){
        return $this->belongsTo('App\DaftarNilaiAkhir','id_periode','id_periode') ;
    }
    public function Mahasiswa(){
        return $this->belongsTo('App\Mahasiswa','id_periode','id_periode') ;
    }
    public function instansi(){
        return $this->belongsTo('App\Instansi','id_periode','id_periode') ;
    }
}
