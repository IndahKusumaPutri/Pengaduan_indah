<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->char('nik', 17);
            $table->string('name', 50);
            $table->string('email', 191)->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password', 191);
            $table->char('telp', 11);
            $table->enum('jenis_kel', ['laki-laki','perempuan']);
            $table->enum('level', ['admin','petugas','user']);
            $table->text('alamat');
            $table->char('rt', 4);
            $table->char('rw', 4);
            $table->char('kode_pos', 5);
            $table->char('province_id', 2);
            $table->char('regency_id', 4);
            $table->char('district_id', 7);
            $table->char('village_id', 10);
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
}
