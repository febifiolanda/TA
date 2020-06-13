<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class NilaiAkhir extends Model
{
    protected $primaryKey = 'id_nilai';
    protected $table = 'nilai';
    public $timestamps = true;
    protected $fillable = [
        'id_periode',
        'id_mahasiswa',
        'id_aspek_penilaian',
        'id_kelompok_penilai',
        'nilai',
        'isDeleted',
        'created_by',
    ];
}
