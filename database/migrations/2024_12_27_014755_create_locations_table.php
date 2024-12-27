<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLocationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('locations', function (Blueprint $table) {
            $table->id();
            $table->string('name'); // Nama lokasi
            $table->text('address')->nullable(); // Alamat (dapat di-generate otomatis)
            $table->string('photo')->nullable(); // URL Foto
            $table->decimal('latitude', 10, 7); // Latitude
            $table->decimal('longitude', 10, 7); // Longitude
            $table->timestamps(); // Created_at & Updated_at
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('locations');
    }
}
