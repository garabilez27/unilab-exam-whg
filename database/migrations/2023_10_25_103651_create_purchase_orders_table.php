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
        Schema::create('purchase_orders', function (Blueprint $table) {
            $table->id();
            $table->integer('customerID');
            $table->date('dateOfDelivery');
            $table->smallInteger('status');
            $table->double('amountDue', 11, 2);
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
        Schema::dropIfExists('purchase_orders');
    }
};
