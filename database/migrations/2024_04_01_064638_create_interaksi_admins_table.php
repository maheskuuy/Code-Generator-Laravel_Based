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
        Schema::create('interaksi_admins', function (Blueprint $table) {
            $table->id();
            $table->integer('Id_interaksi')->primary();
            $table->string('Key_generate');
            $table->timestamp('published_at');
            $table->foreignId('menu_configuration&_form_tables_configuration_id');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('interaksi_admins');
    }
};
