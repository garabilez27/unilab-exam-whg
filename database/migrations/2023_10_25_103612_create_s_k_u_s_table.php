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
        Schema::create('s_k_u_s', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('code');
            $table->double('unitPrice', 11,2);
            $table->date('dateCreated')->default(today());
            $table->integer('createdBy');
            $table->timestamps();
            $table->integer('userID');
            $table->smallInteger('active')->default(1);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('s_k_u_s');
    }
};
