<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mahasiswa extends Model
{
  
    protected $table = 'mahasiswa';
    protected $guarded = ['created_at', 'updated_at'];
    public $timestamps = true;
    protected $primaryKey = 'id_mahasiswa';
    // protected $fillable=[
    //     'id_kelompok',
    //     'judul',
    //     'berkas',
    //     'isDeleted',
    //     'created_by',
    // ];

    public function detailGroup(){
        return $this->hasMany('App\DetailGroup','id_mahasiswa','id_mahasiswa') ;
    }
}
