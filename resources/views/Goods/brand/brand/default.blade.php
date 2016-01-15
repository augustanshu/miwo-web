 
 <!--<button id="brand-create" class="btn btn-primary btn-sm">{{trans('cms.new')}}</button>-->

<div class="col-lg-12" id="brand-entry">
<table id="brand_table" class="table table-bordered">
  <thead>
   <tr>
   <th>品牌名称</th>
   <th>名称缩写</th>
   <th>所属分类</th>
   <th>品牌图片</th>
   <th>操作</th>
   </tr>
  </thead>
</table>
</div>

<script type="text/javascript">

$(document).ready(function(){
	$('#brand_table').DataTable({
		"jQuery":true,
		responsive:true,
		"processing":true,
		"bSort":false,//是否支持排序功能
		"oLanguage":{
			"sLengthMenu":"每页显示_MENU_条记录",
		"sZeroRecords":"对不起，查询不到任何相关数据",
		"sInfoEmpty":"找不到相关数据",
		"sInfoFiltered":"数据表中共为_MAX_条记录)",
		"sProcessing":"正在加载中...",
		"sSearch":"搜索",
		"sURL":"",
		"oPaginate":{
				"sFirst":"第一页",
				"sPrevious":"上一页",
				"sNext":"下一页",
				"sLast":"最后一页"
			}
		},
		"ajax":'{{URL::to('/admin/goods/brand')}}',
		"columns":[
		 { "data": "brand_name" },
		  { "data": "brand_initial"},
		   { "data": "name" },
		    { "data": "brand_pic" },
				{"data":"null"},
		],
		 "columnDefs": [{
            "targets": -1,//编辑
            "data": null,
            "defaultContent": "<button id='editrow' class='btn btn-primary' type='button'><i class='fa fa-edit'></i></button> " +
                "<button id='delrow' class='btn btn-primary' type='button'><i class='fa fa-trash-o'></i></button>"
        },
        ],
		
		initComplete:function(){
			
		}
	});
	//数据编辑
	$('#brand_table tbody').on('click','button#editrow',function(){
	
	});
	
	//数据删除
	$('#brand_table tbody').on('click','button#delrow',function(){
		
		var data=$('#brand_table').DataTable().row($(this).parents('tr')).data();
	        swal({
                title: "Are you sure?",
                text: "You will not be able to recover this data!",
                type: "warning",
                showCancelButton: true,
                confirmButtonColor: "#DD6B55",
                confirmButtonText: "Yes, delete it!",
                closeOnConfirm: false
            }, function(){
                    $data = new FormData();
                    $.ajax({
                        url: '/admin/goods/brand/'+data['id'],
                        type: 'DELETE',
                        processData: false,
                        contentType: false,
                        success:function(data, textStatus, jqXHR)
                        {
                            swal("Deleted!", "The brand has been deleted.", "success");
							 $('#brand_table').DataTable().ajax.reload( null, false );
                        },
                    });
            });	
			
	});
	
	});
</script>
