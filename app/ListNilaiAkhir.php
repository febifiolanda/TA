<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ListNilaiAkhir extends Model
{
    protected $table = 'kelompok';
    protected $guarded = ['created_at', 'updated_at'];
    public $timestamps = true;
    protected $primaryKey = 'id_kelompok';

    public function mahasiswa(){
        return $this->belongsTo('App\Mahasiswa','id_mahasiswa','id_mahasiswa') ;
    }
}
