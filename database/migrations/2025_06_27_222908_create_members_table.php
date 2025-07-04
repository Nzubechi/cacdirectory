<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('members', function (Blueprint $table) {
            $table->id();
            $table->string('first_name');
            $table->string('surname');
            $table->string('phone')->nullable();
            $table->string('email')->nullable();
            $table->text('home_address')->nullable();
            $table->string('profession')->nullable();
            $table->date('dob')->nullable();
            $table->string('gender')->nullable();
            $table->string('group')->nullable();
            $table->string('department')->nullable();
            $table->string('class')->nullable();
            $table->text('remark')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('members');
    }
};
