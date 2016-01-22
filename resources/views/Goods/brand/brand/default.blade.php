 
 <!--<button id="brand-create" class="btn btn-primary btn-sm">{{trans('cms.new')}}</button>-->

<div class="col-lg-12" id="brand-entry">
<table id="main-list" class="table table-striped table-bordered">
  <thead>
   <th>品牌名称</th>
   <th>名称缩写</th>
   <th>所属分类</th>
  </thead>
</table>
</div>

<script type="text/javascript">

$(document).ready(function(){
	$('#main-list').DataTable({
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
			
		],
		initComplete:function(){
			
		}
	});
	//数据编辑
    $('#main-list tbody').on( 'click', 'tr', function () {
        $(this).toggleClass('selected').removeClass("selected");
        var d = $('#main-list').DataTable().row( this ).data();
        $('#entry-brand').load('{{URL::to('admin/goods/brand')}}' + '/' + d.id);
    });
	
	});
</script>
