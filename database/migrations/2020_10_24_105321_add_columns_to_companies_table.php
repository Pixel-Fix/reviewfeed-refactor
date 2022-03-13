<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnsToCompaniesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('companies', function (Blueprint $table) {
            //
            $table->string('description')->nullable();
            $table->string('contact_number')->nullable();
            $table->string('email')->nullable();
            $table->string('website_url')->nullable();
            $table->string('facebook_url')->nullable();
            $table->string('twitter_url')->nullable();
            $table->string('insta_url')->nullable();
            $table->integer('user_id')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('companies', function (Blueprint $table) {
            //
            $table->dropColumn('description');
            $table->dropColumn('contact_number');
            $table->dropColumn('email');
            $table->dropColumn('website_url');
            $table->dropColumn('facebook_url');
            $table->dropColumn('twitter_url');
            $table->dropColumn('insta_url');
            $table->dropColumn('user_id');
        });
    }
}
