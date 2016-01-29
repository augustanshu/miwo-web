<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function ($table) {
            $table->increments('id');
			$table->string('name');
			$table->string('desc');
			$table->decimal('price');
			$table->string('props');
			$table->string('input_str');
			$table->string('input_pids');
			$table->integer('cid');
			$table->string('code');
			$table->string('status')->default('on');
			$table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('products');
    }
}
