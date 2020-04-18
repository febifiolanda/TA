<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Periode extends Model
{
    protected $table = 'periode';
    protected $guarded = ['created_at', 'updated_at'];
    public $timestamps = true;
    protected $primaryKey = 'id_periode';

    public function group(){
        return $this->hasMany('App\Group','id_periode','id_periode') ;
    }
}
