<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('gabs', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("request_id");
             $table->unsignedBigInteger("clinic_id");
            $table->foreign('clinic_id')->references('id')->on('users')->onUpdate('cascade');  
            $table->foreign('request_id')->references('id')->on('gabs_requests')->onUpdate('cascade');          
            $table->binary("path")->nullable();
            $table->text("message")->nulable();
            $table->enum("status", ["pendente", "emitida", "negada"]);
            $table->string("name");
            $table->string("description");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('gabs');
    }
};
