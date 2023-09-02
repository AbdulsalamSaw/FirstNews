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
      //update schema
        //Schema::table('categories', function (Blueprint $table) {
       // $table->text('description');
       // $table->string('image')->nullable();
       // });

       Schema::table('articles', function (Blueprint $table) {
        $table->unsignedBigInteger('category_id');
        $table->foreign('category_id')->references('id')->on('categories');
    });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {

    }
};
