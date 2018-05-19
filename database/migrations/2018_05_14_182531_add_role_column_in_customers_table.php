<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddRoleColumnInCustomersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
{
    Schema::table('nm_customer', function (Blueprint $table) {
        $table->integer('role_id')->after('cus_email')->nullable();

    });
}

/**
 * Reverse the migrations.
 *
 * @return void
 */
public function down()
{
    Schema::table('nm_customer', function (Blueprint $table) {
        $table->dropColumn('role_id');
    });
}
}
