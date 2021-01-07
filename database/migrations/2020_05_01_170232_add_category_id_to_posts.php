<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddCategoryIdToPosts extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('posts', function (Blueprint $table) {

            // php artisan make:migration add_category_id_to_posts --table=posts

            //making it unsigned makes it ranges from 1 to 256 rather than signed (-256 to 256) which is not required here (by this it will only store positive integers)

            //also we are using nullable because if we use required than we have to edit all the posts we have created before

            // now making the colomns
            $table->integer('category_id')->nullable()->after('slug')->unsigned();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('posts', function (Blueprint $table) {
            $table->dropColumn('category_id');
        });
    }
}
