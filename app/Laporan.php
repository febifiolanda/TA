<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Laporan extends Model
{
    protected $table = 'laporan';
    protected $guarded = ['created_at', 'updated_at'];
    public $timestamps = true;
    protected $primaryKey = 'id_laporan';
    protected $fillable=[
        'id_kelompok',
        'judul',
        'berkas',
        'isDeleted',
        'created_by',
    ];

    public function group(){
        return $this->belongsTo('App\Group','id_kelompok','id_kelompok') ;
    }
}
