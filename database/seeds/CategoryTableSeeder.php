<?php

use Illuminate\Database\Seeder;

class CategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
		DB::table('categories')->truncate();
        DB::table('categories')->insert([
	    [
		 'id'           =>'1',
	     'name'          =>'数码办公',
		 'parent_id'     =>'0',
		 'is_parent'      =>'1',
		 'order'         =>'1',		 
	   ],
	    [
		 'id'           =>'2',
	     'name'          =>'特产食品',
		 'parent_id'     =>'0',
		 'is_parent'      =>'1',
		 'order'         =>'0',		 
	   ],
	    [
		 'id'           =>'3',
	     'name'          =>'居家生活',
		 'parent_id'     =>'0',
		 'is_parent'      =>'1',
		 'order'         =>'2',		 
	   ],
	   [
	    'id'           =>'4',
	     'name'          =>'生活健康',
		 'parent_id'     =>'0',
		 'is_parent'      =>'1',
		 'order'         =>'3',		 
	   ],
	    [
		'id'           =>'5',
	     'name'          =>'母婴用品',
		 'parent_id'     =>'0',
		 'is_parent'      =>'1',
		 'order'         =>'4',		 
	   ],
	    [
		 'id'           =>'6',
	     'name'          =>'鞋帽服饰',
		 'parent_id'     =>'0',
		 'is_parent'      =>'1',
		 'order'         =>'5',		 
	   ],
	   [
	   'id'           =>'7',
	     'name'          =>'美容珠宝',
		 'parent_id'     =>'0',
		 'is_parent'      =>'1',
		 'order'         =>'6',		 
	   ],
	    [
		 'id'           =>'8',
	     'name'          =>'虚拟充值',
		 'parent_id'     =>'0',
		 'is_parent'      =>'1',
		 'order'         =>'7',		 
	   ],
	   [
	   'id'           =>'9',
	     'name'          =>'运动器材',
		 'parent_id'     =>'0',
		 'is_parent'      =>'1',
		 'order'         =>'7',		 
	   ],
	   [
	    'id'           =>'10',
	     'name'          =>'进口食品',
		 'parent_id'     =>'2',
		 'is_parent'      =>'1',
		 'order'         =>'0',		 
	   ],
	   [
	    'id'           =>'11',
	     'name'          =>'地方特产',
		 'parent_id'     =>'2',
		 'is_parent'      =>'1',
		 'order'         =>'1',		 
	   ],
	    [
		 'id'           =>'12',
	     'name'          =>'休闲食品',
		 'parent_id'     =>'2',
		 'is_parent'      =>'1',
		 'order'         =>'2',		 
	   ],
	   [ 'id'           =>'13',
	     'name'          =>'粮油调味',
		 'parent_id'     =>'2',
		 'is_parent'      =>'1',
		 'order'         =>'3',		 
	   ],
	   [
	   'id'           =>'14',
	     'name'          =>'中外名酒',
		 'parent_id'     =>'2',
		 'is_parent'      =>'1',
		 'order'         =>'4',		 
	   ],
	   [
	    'id'           =>'15',
	     'name'          =>'饮料冲调',
		 'parent_id'     =>'2',
		 'is_parent'      =>'1',
		 'order'         =>'5',		 
	   ],
	   [
	    'id'           =>'16',
	     'name'          =>'营养健康',
		 'parent_id'     =>'2',
		 'is_parent'      =>'1',
		 'order'         =>'6',		 
	   ],
	   [
	    'id'           =>'17',
	     'name'          =>'生鲜食品',
		 'parent_id'     =>'2',
		 'is_parent'      =>'1',
		 'order'         =>'7',		 
	   ],
	   [
	    'id'           =>'18',
	     'name'          =>'健康礼品',
		 'parent_id'     =>'2',
		 'is_parent'      =>'1',
		 'order'         =>'8',		 
	   ],
	   [
	    'id'           =>'19',
	     'name'          =>'饼干蛋糕',
		 'parent_id'     =>'10',
		 'is_parent'      =>'0',
		 'order'         =>'0',		 
	   ],
	   [
	    'id'           =>'20',
	     'name'          =>'休闲零食',
		 'parent_id'     =>'10',
		 'is_parent'      =>'0',
		 'order'         =>'0',		 
	   ],
	   [
	    'id'           =>'21',
	     'name'          =>'糖果巧克力',
		 'parent_id'     =>'10',
		 'is_parent'      =>'0',
		 'order'         =>'0',		 
	   ],
	   [
	   'id'           =>'22',
	     'name'          =>'冲调饮品',
		 'parent_id'     =>'10',
		 'is_parent'      =>'0',
		 'order'         =>'0',		 
	   ],
	   [
	    'id'           =>'23',
	     'name'          =>'粮油调味',
		 'parent_id'     =>'10',
		 'is_parent'      =>'0',
		 'order'         =>'0',		 
	   ],
	   ]);
    }
}
