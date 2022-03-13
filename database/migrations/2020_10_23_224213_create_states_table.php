<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class CreateStatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('states', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('slug');
            $table->timestamps();
        });

        DB::table('states')->insert(['name' => 'Australian Capital Territory','slug' => 'australian-capital-territory']);
        DB::table('states')->insert(['name' => 'New South Wales','slug' => 'new-south-wales']);
        DB::table('states')->insert(['name' => 'Northern Territory','slug' => 'northern-territory']);
        DB::table('states')->insert(['name' => 'Queensland','slug' => 'queensland']);
        DB::table('states')->insert(['name' => 'South Australia','slug' => 'south-australia']);
        DB::table('states')->insert(['name' => 'Tasmania','slug' => 'tasmania']);
        DB::table('states')->insert(['name' => 'Victoria','slug' => 'victoria']);
        DB::table('states')->insert(['name' => 'Western Australia','slug' => 'western-australia']);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('states');
    }
}
