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
    public function detailGroup(){
        return $this->hasMany('App\DetailGroup','id_kelompok','id_kelompok') ;
    }
}
