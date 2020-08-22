<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    protected $table = 'dosen';
    protected $guarded = ['created_at', 'updated_at'];
    public $timestamps = true;
    protected $primaryKey = 'id_dosen';
    protected $fillable=[
        'id_users',
        'nama',
        'nip',
        'email',
        'no_hp',
        'slot',
        'kapasitas',
        'status',
        'foto',
        'isDeleted',
        'created_by'
    ];

    public function instansi(){
        return $this->belongsTo('App\Instansi','id_users','id_users') ;
    }
    public function users(){
        return $this->belongsTo('App\User', 'id_users');
    }
}
