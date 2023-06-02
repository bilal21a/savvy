<?php

use App\Models\User;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->enum("gender",["male","female"])->default("male")->nullable()->after("email");
            $table->string("city")->nullable()->after("gender");
            $table->string("country")->nullable()->after("city");
            $table->enum("type",["admin","website"])->default("website")->after("country");
            $table->string("pin_verification")->nullable()->after("email_verified_at");
        });
        User::insert([
            "name" => "Asym Rasheed",
            "email" => "asym@gmail.com",
            "password" => Hash::make("123456"),
            "type" => "admin"
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            //
        });
    }
};
