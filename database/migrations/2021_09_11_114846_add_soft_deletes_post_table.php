<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddSoftDeletesPostTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('posts', function(Blueprint $table) {
            $table->renameColumn('description', 'content');
            $table->softDeletes();
            $table->string('slug')->after('description');
            $table->string('author')->after('slug');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('posts', function(Blueprint $table) {
            $table->dropSoftDeletes();
            $table->dropColumn('author');
            $table->dropColumn('slug');
            $table->renameColumn('content','description');
            
        });
    }
}
