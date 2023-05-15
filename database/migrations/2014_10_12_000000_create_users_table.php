<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
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
            $table->string('username')->unique()->nullable();
            $table->string('password');
            $table->enum('level', ['Admin','Petugas', 'Pelanggan', 'Mitra']);
            $table->foreignId('pelanggan_id')->nullable();
            $table->foreignId('petugase_id')->nullable();
            $table->foreignId('admin_id')->nullable();
            $table->foreignId('mitra_id')->nullable();
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
};
