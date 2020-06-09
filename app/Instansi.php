<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Instansi extends Model
{
    protected $table = 'instansi';
    protected $guarded = ['created_at', 'updated_at'];
    public $timestamps = true;
    protected $primaryKey = 'id_instansi';
   
   
    // public function dosen(){
    //     return $this->hasMany('App\Dosen','id_users','id_users') ;
    // }
}
