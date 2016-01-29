<?php
return 
  [
  
 'category'=>[
       'Name'=>'分类',
       'name'=>'分类',
       'names'=>'分类',
       'label'           => [
	                          "id"                          =>  '序号',
                              "name"                         => '类别名称',
						      "order"                         =>' 排序',
						      "description"                  =>'描述',
							  "parent-id"                     =>'父类',
                               "type"                         =>'类型',
                        
                            ],
							
	'placeholder'       => [
                        "description"                  => '请输入描述',
						"parent-id"                     =>'请输入父类序号',
                        "name"                         => '请输入分类名称',
						"order"                        => '请输入排序',
						"type"                         => '请输入类型名称'
                        ],

                ], 
				
	'brand'=>[
	   'Name'=>'品牌',
       'name'=>'品牌',
       'names'=>'品牌',
	   'options'         =>[
	                      
						  
						  
						  ],
						  
       'label'           => [
	                          "id"                          =>  '序号',
                              "name"                         => '品牌名称',
						      "order"                         =>' 排序',
						      "description"                  =>'描述',
							  "parent-id"                     =>'父类',
                               "type"                         =>'类型',
							   "brand_initial"                =>'首字母缩写',
							   "class"                        =>'分类名称',
							   "img"                    =>'请选择商标'
                        
                            ],
							
	'placeholder'       => [
                        "description"                  => '请输入描述',
						"parent-id"                     =>'请输入父类序号',
                        "name"                         => '请输入品牌名称',
						"order"                        => '请输入排序',
						"type"                         => '请输入类型名称',
						"brand_initial"                =>'请输入首字母缩写',
						"class"                        =>'请选择分类'
                        ],

                ], 
				
	   'product'=>[
	   'Name'=>'商品',
       'name'=>'商品',
       'names'=>'商品',
	   'code'=>'编码',
	   'price'=>'价格',
	   'category'=>'类别',
	   'options'         =>[
	                      
						  
						  
						  ],
						  
       'label'           => [
	                          "id"                          =>  '序号',
                              "name"                         => '商品名称',
							  "code"                         =>'商品编码',
							  "price"                         =>'价格/元',
							  "category"                     =>'分类',
						      "order"                         =>' 排序',
						      "description"                  =>'描述',
							  "parent-id"                     =>'父类',
                               "type"                         =>'类型',
							   "brand_initial"                =>'首字母缩写',
							   "class"                        =>'分类名称',
							   "img"                    =>'请选择商标'
                        
                            ],
							
	'placeholder'       => [
                        "description"                  => '请输入描述',
						"code"                            =>'请输入商品编码',
						"price"                         =>'请输入价格信息',
						"category"                     =>'请选择类别',
						"parent-id"                     =>'请输入父类序号',
                        "name"                         => '请输入商品名称',
						"order"                        => '请输入排序',
						"type"                         => '请输入类型名称',
						"brand_initial"                =>'请输入首字母缩写',
						"class"                        =>'请选择分类'
                        ],

                ], 
	  
  ]
?>