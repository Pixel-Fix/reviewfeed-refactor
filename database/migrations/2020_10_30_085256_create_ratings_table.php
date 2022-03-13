<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class CreateRatingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ratings', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->timestamps();
        });

        DB::table('ratings')->insert(['name'=>'1 Star']);
        DB::table('ratings')->insert(['name'=>'2 Stars']);
        DB::table('ratings')->insert(['name'=>'3 Stars']);
        DB::table('ratings')->insert(['name'=>'4 Stars']);
        DB::table('ratings')->insert(['name'=>'5 Stars']);

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ratings');
    }
}
