<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
       
        Schema::table('products', function (Blueprint $table) {
            $table->renameColumn('nama','name');
            $table->renameColumn('keterangan','description');
            $table->text('image')->nullable();
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        
        Schema::table('products', function (Blueprint $table) {
            $table->renameColumn('name','nama');
            $table->renameColumn('description','keterangan');
            $table->dropColumn('image')->nullable();
            
        });
    }
}
