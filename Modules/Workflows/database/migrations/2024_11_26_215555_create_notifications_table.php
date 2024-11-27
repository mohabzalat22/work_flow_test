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
        Schema::create('notifications', function (Blueprint $table) {
            $table->uuid('id')->primary();  // Use UUID for the primary key
            $table->morphs('notifiable');    // Creates notifiable_id and notifiable_type columns
            $table->string('type');          // Store notification type (class name)
            $table->text('data');            // Store notification data in JSON format
            $table->timestamp('read_at')->nullable();  // For tracking if the notification is read
            $table->timestamps();           // Created and updated timestamps
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('notifications');
    }
};
