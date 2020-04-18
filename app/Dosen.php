<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Dosen extends Model
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
}
