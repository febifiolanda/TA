<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DaftarNilaiAkhir extends Model
{
    protected $table = 'mahasiswa';
    protected $guarded = ['created_at', 'updated_at'];
    public $timestamps = true;
    protected $primaryKey = 'id_mahasiswa';

    public function Group(){
        return $this->hasMany('App\Group','id_periode','id_periode') ;
    }
}
