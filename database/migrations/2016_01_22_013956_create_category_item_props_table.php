<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCategoryItemPropsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('category_item_props', function ($table) {
            $table->increments('id')->unsigned();
			$table->string('name',200);
			$table->integer('parent_pid');
			$table->integer('parent_vid');
			$table->boolean('is_key_prop')->default('0');//是否是关键属性
			$table->boolean('is_sale_prop')->default('0');//是否是销售属性
			$table->boolean('is_color_prop')->default('0');//是否是颜色属性
			$table->boolean('is_enum_prop')->default('1');//是否是可枚举属性
			$table->boolean('is_item_prop')->default('0');//是否是商品属性
			$table->boolean('is_must')->default('0');//发布商品时必选属性
			$table->boolean('is_multi')->default('0');//发布商品时是否可以多选
			$table->string('status')->default('normal');
			$table->integer('order')->default('0');
			$table->boolean('is_erp')->default('0');//作为ERP使用
			$table->string('child_template')->default('0');//子属性模板
			$table->boolean('is_allow_alias')->default('1');//是否允许别名
			$table->boolean('is_input_prop')->default('0');//在is_enum_prop是true的前提下，是否是卖家可以自行输入的属性
		    $table->string('desc',200);//说明
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
        Schema::drop('category_item_props');
    }
}
