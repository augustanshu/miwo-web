<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBrandsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('brands', function (Blueprint $table) {
            $table->increments('id');
			$table->string('brand_name');
			$table->string('brand_initial');
			$table->integer('class_id');
			$table->string('brand_pic');
			$table->integer('brand_sort')->default(0);
			$table->integer('brand_recommend')->default(0);
			$table->string('brand_store');
			$table->integer('brand_status')->default(0);
			$table->integer('show_type')->default(0);
			$table->string('upload_folder', 100)->nullable();
            $table->text('images')->nullable();
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
        Schema::drop('brands');
    }
}
