<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('department_selection', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->timestamps();
        });

        $departments = [
            ['name' => 'Children', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Choir', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Drama', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Evangelical', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Interpreters', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Publicity', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Royal Shepherd', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Sunday School', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Ushering', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Faith Home Maternity', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Mount Multimedia', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Welfare', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Traffic and Security', 'created_at' => now(), 'updated_at' => now()],
        ];

        DB::table('department_selection')->insert($departments);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('department_selection');
    }
};
