<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('orders', function (Blueprint $table) {
            Schema::table('orders', function (Blueprint $table) {
                $table->unsignedBigInteger('shipping_address_id')->nullable()->after('shipping_price');
                $table->foreign('shipping_address_id')
                      ->references('id')
                      ->on('shipping_addresses')
                      ->onDelete('set null');
            });
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('orders', function (Blueprint $table) {
            // Drop the foreign key constraint
            $table->dropForeign(['shipping_address_id']);

            // Drop the column
            $table->dropColumn('shipping_address_id');
        });
    }
};
