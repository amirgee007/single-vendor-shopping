<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddPricesColumnsInProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('nm_product', function (Blueprint $table) {
            $table->float('retail_sale_price')->after('product_brand_id');
            $table->float('wholesale_price')->after('product_brand_id');
            $table->integer('stock_quantity')->after('product_brand_id');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('nm_product', function (Blueprint $table) {
            $table->dropColumn('retail_sale_price');
            $table->dropColumn('wholesale_price');
            $table->dropColumn('stock_quantity');
        });
    }
}
