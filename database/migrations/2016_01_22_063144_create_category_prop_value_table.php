<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCategoryPropValueTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('category_prop_values', function ($table) {
            $table->increments('id')->unsigned();
			$table->string('name',200);
			$table->string('name_alias',200);
			$table->integer('pid');
			$table->boolean('is_parent')->default('0');
			$table->string('status')->default('normal');
			$table->integer('order')->default(0);
			$table->string('modified_type')->default('modify');//三种枚举类型:add,delete（数值增加减少）,modify
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
        Schema::drop('category_prop_values');
    }
}
