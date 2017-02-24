<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterStaffmanagementsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('staffmanagements', function($table) {
        $table->string('department')->default(0)->change();
        $table->text('desc')->nullable()->change();
        $table->integer('division');
        $table->integer('view_photo')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('staffmanagements', function($table) {
        $table->dropColumn('division');
        $table->dropColumn('view_photo');
        });
    }
}
