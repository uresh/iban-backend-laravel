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
        Schema::create('ibans', function (Blueprint $table) {
            $table->id(); // Auto-incremental primary key
            $table->string('iban_no'); // IBAN number field
            $table->unsignedBigInteger('user_id'); // Foreign key to link IBANs to users
            $table->timestamps(); // Created_at and updated_at timestamps

            // Define foreign key constraint to link IBANs to users
            $table->foreign('user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ibans');
    }
};
