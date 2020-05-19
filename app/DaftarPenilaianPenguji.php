<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DaftarPenilaianPenguji extends Model
{
    protected $table = 'kelompok';
    protected $guarded = ['created_at', 'updated_at'];
    public $timestamps = true;
    protected $primaryKey = 'id_kelompok';

    
    public function periode(){
        return $this->belongsTo('App\Periode','id_periode','id_periode') ;
    }
}
