<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddCompanyIdToProductsTable extends Migration
{
    public function up()
    {
        Schema::table('products', function (Blueprint $table) {
            $table->unsignedBigInteger('company_id')->after('status');
        });
    }

    public function down()
    {
        Schema::table('products', function (Blueprint $table) {
            // Remove the column if necessary
            $table->dropColumn('company_id');
        });
    }
}
