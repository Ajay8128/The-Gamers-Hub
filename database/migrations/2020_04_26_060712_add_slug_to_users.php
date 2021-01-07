<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddSlugToUsers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // syntax --> Schema::table('users', function (Blueprint $table) 

        schema::table('posts',function($table){

            $table->string('slug')->unique()->after('body'); //will create a colomn named slug in table posts indexed as unique other options are also available in laravel documentation/database/migrations okk.
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('posts', function($table) {

            $table->dropColomn('slug');
            
        });
    }
}
