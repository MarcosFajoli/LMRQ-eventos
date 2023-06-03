<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('events', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 100)->default('Evento Padrão');
            $table->text('description')->nullable();
            $table->datetime('date')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->unsignedInteger('modal_id')->nullable();
            $table->timestamps();

            $table->foreign('modal_id')->references('id')->on('modalities')->onUpdate('cascade')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('events');
    }
};
