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
        Schema::create('customers', function (Blueprint $table) {
            $table->id();
            $table->string('firstname');
            $table->string('lastname');
            $table->string('fullname');
            $table->string('mobileNumber');
            $table->string('city');
            $table->timestamp('dateCreated')->useCurrent();
            $table->integer('createdBy');
            $table->timestamp('updatedAt')->useCurrent()->useCurrentOnUpdate();
            $table->integer('userID');
            $table->smallInteger('active')->default(1);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('customers');
    }
};
