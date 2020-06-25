<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateModelUserTable extends Migration{

    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('username',100)->unique();
            $table->string('password');
            $table->string('name');
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
    public function mahasiswa(){
        return $this->hasOne('App\Mahasiswa', 'id_users');
    }
    public function dosen(){
        return $this->hasOne('App\Dosen', 'id_users');
    }
    public function instansi(){
        return $this->hasOne('App\Instansi', 'id_users');
    }
}