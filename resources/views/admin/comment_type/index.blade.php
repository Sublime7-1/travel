<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="renderer" content="webkit|ie-comp|ie-stand">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no" />
<meta http-equiv="Cache-Control" content="no-siteapp" />
        <link href="/style/admin/assets/css/bootstrap.min.css" rel="stylesheet" />
        <link rel="stylesheet" href="/style/admin/css/style.css"/>       
        <link href="/style/admin/assets/css/codemirror.css" rel="stylesheet">
        <link rel="stylesheet" href="/style/admin/assets/css/ace.min.css" />
        <link rel="stylesheet" href="/style/admin/font/css/font-awesome.min.css" />
        <!--[if lte IE 8]>
		  <link rel="stylesheet" href="assets/css/ace-ie.min.css" />
		<![endif]-->
		<script src="/style/admin/js/jquery-1.9.1.min.js"></script>
		<script src="/style/admin/assets/js/typeahead-bs2.min.js"></script>   
        <script src="/style/admin/js/lrtk.js" type="text/javascript" ></script>		
		<script src="/style/admin/assets/js/jquery.dataTables.min.js"></script>
		<script src="/style/admin/assets/js/jquery.dataTables.bootstrap.js"></script>
        <script src="/style/admin/assets/layer/layer.js" type="text/javascript" ></script>                 
<title>评论类型</title>
</head>

<body>
<div class="page-content clearfix">
 <div class="sort_style">
 	<div class="search_style">  
 	<form action="/admin/comment_type" method="get"> 
      <ul class="search_content clearfix">
       <li><label class="l_f">评论类名 :</label><input name="name" value="{{$request->name or ''}}" type="text" class="text_add" placeholder="输入评论类名" style=" width:200px;height: 32px"></li>
       <li style="width:90px;"><button type="submit" class="btn_search"><i class="icon-search"></i>查询</button></li>
      </ul>
    </form>
    </div>
     <div class="border clearfix">
       <span class="l_f">
        <a href="javascript:ovid()" id="sort_add" class="btn btn-warning"><i class="fa fa-plus"></i> 添加分类</a>
        <a href="javascript:ovid()" class="btn btn-danger"><i class="fa fa-trash"></i> 批量删除</a>
       </span>
       <span class="r_f">共：<b>{{$total}} </b>类</span>
     </div>
	<!-- 验证消息 -->
      <?php $errorss='错误信息 :' ?>
      @if (count($errors) > 0)
            @foreach ($errors->all() as $error)
              <?php $errorss = $errorss."<br>".$error ?>
            @endforeach
            <script>layer.msg("{!!$errorss!!}",{icon: 5,time:5000});</script>
      @endif
	  @if(session('success'))
	  <div class="alert alert-success">
	  <div class="mws-form-message success">
	      {{session('success')}}
	  </div>
	  </div>
	  <script>
	  setTimeout(function(){
	      $('.alert-success').hide();
	  },2000);
	  </script>
	  @endif
	  @if(session('error'))
	  <div class="alert alert-danger">
	  <div class="mws-form-message warning">
	      {{session('error')}}
	  </div> 
	  </div>  
	  <script>
	  setTimeout(function(){
	      $('.alert-danger').hide();
	  },2000);
	  </script>
	  @endif
  <div class="sort_list">
    <table class="table table-striped table-bordered table-hover" id="sample-table">
		<thead>
		 	<tr>
				<th width="25px"><label><input type="checkbox" class="ace"><span class="lbl"></span></label></th>
				<th width="50px">ID</th>
				<th width="100px">分类名</th>
				<th width="200px">等级</th>
				<th width="100px">路径</th>
				<th width="100px">查看评论</th>
				<th width="100px">状态</th>				
				<th width="200px">操作</th>
			</tr>
		</thead>
	<tbody>
	  @foreach($data as $k=>$v)
      <tr>
       <td><label><input type="checkbox" class="ace"><span class="lbl"></span></label></td>
       <td>{{$v->id}}</td>
       <td>{{$v->name}}</td>
       <td>
       		@if($v->pid == 0)
       			顶级分类
       		@else
       			{{$v->pid}}
       		@endif
       </td>
       <td>{{$v->path}}</td>
       <td class="td-manage">
         <a title="查看" href="/admin/comment_type/{{$v->id}}"  class="btn btn-xs btn-info" >点击查看</a>   
       </td>
       <td class="td-status">
        	@if($v->status == '启用')
        		<span class="label label-success radius">{{$v->status}}</span>
	        @else
	            <span class="label label-defaunt radius">{{$v->status}}</span>
	        @endif
       </td>
       <td class="td-manage td-manages">
        @if($v->status == '启用')
        <a onclick="member_stop(this,{{$v->id}})"  href="javascript:;" title="停用"  class="btn btn-xs btn-success"><i class="fa fa-check  bigger-120"></i></a>
        @else
        <a style="text-decoration:none" class="btn btn-xs " onclick="member_start(this,{{$v->id}})" href="javascript:;" title="启用"><i class="fa fa-close bigger-120"></i></a>
        @endif   
        <a title="编辑" id="sort_edit" value="{{$v->id}}" href="javascript:;"  class="btn btn-xs btn-info sort_edit" ><i class="fa fa-edit bigger-120"></i></a>      
        <a title="删除" href="javascript:;" onclick="member_del(this,'{{$v->id}}')" class="btn btn-xs btn-danger"><i class="fa fa-trash  bigger-120"></i></a>
       </td>
      </tr>
      @endforeach
    </tbody>
    </table>
  </div>
 </div>
</div>
<!--添加分类-->
<div class="sort_style_add margin" id="sort_style_add" style="display:none">
	<form action="/admin/comment_type" method="post" id="typeadd">
	{{csrf_field()}}
  <div class="">
     <ul>
      <li><label class="label_name">分类名称</label><div class="col-sm-9"><input name="name" type="text" id="form-field-1" autocomplete="off" placeholder="&nbsp;&nbsp;请输入简易的分类名称..." required maxlength="8" class="col-xs-10 col-sm-5"></div></li>

     <li><label class="label_name">分类状态</label>&nbsp;&nbsp;
      <span class="add_content"> &nbsp;&nbsp;
      	<label>
      		<input name="status" value="0" type="radio" checked="checked" class="ace">
      		<span class="lbl">启用</span>
      	</label>&nbsp;&nbsp;&nbsp;
     	<label>
     		<input name="status" type="radio" value="1" class="ace">
     		<span class="lbl">停用</span>
     	</label>
      </span>
     </li>
 	 <li>
 	 	<div class="col-md-offset-1"><input type="submit" class="btn btn-success radius" value="提交">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="reset" class="btn btn-danger radius" value="重置"></div>
 	 </li>
     </ul>
  </div>
	</form>
</div>
<!--修改分类-->
<div class="sort_style_edit margin" id="sort_style_edit" style="display:none">

</div>

</body>
</html>
<script type="text/javascript">
// 添加分类
 $('#sort_add').on('click', function(){
	  layer.open({
        type: 1,
        title: '添加分类',
		maxmin: true, 
		shadeClose: false, //点击遮罩关闭层
        area : ['750px' , ''],
        content:$('#sort_style_add'),
     })

})

// 添加子分类
$('.son_add').on('click', function(){
	// 获取当前对象的val值
	var id=$(this).attr('value');
	// alert(id);
	$.get('/admin/comment_type/add/'+id,{},function(data){
		// console.log(data);
		$('#sort_style_edit').html(data);
		layer.open({
	        type: 1,
	        title: '添加子分类',
			maxmin: true, 
			shadeClose: false, //点击遮罩关闭层
	        area : ['800px' , '500px'],
	        content:$('#sort_style_edit'),
	    });
	});

})

// 修改意见类型
$('.sort_edit').on('click', function(){
	// 获取当前对象的val值(id)
	var id=$(this).attr('value');
	// alert(id);
	$.get('/admin/comment_type/'+id+'/edit',{},function(data){
		// console.log(data);
		$('#sort_style_edit').html(data);
		layer.open({
	        type: 1,
	        title: '修改反馈类型',
			maxmin: true, 
			shadeClose: false, //点击遮罩关闭层
	        area : ['800px' , ''],
	        content:$('#sort_style_edit'),
	    });
	});

})

function checkLength(which) {
	var maxChars = 200; //
	if(which.value.length > maxChars){
	   layer.open({
	   icon:2,
	   title:'提示框',
	   content:'您出入的字数超多限制!',	
    });
		// 超过限制的字数了就将 文本框中的内容按规定的字数 截取
		which.value = which.value.substring(0,maxChars);
		return false;
	}else{
		var curr = maxChars - which.value.length; //250 减去 当前输入的
		document.getElementById("sy").innerHTML = curr.toString();
		return true;
	}
};
/*意见类型-停用*/
function member_stop(obj,id){
	// alert(id);
	layer.confirm('确认要停用吗？',function(index){
		$.get('/admin/comment_type/status',{'status':1,'id':id},function(data){
			// alert(data);
            if(data == 1){
                $(obj).parents("tr").find(".td-manages").prepend('<a style="text-decoration:none" class="btn btn-xs " onclick="member_start(this,'+id+')" href="javascript:;" title="启用"><i class="fa fa-close bigger-120"></i></a>');
                $(obj).parents("tr").find(".td-status").html('<span class="label label-defaunt radius">停用</span>');
                $(obj).remove();
                layer.msg('停用!',{icon: 5,time:1000});
            }else{
                layer.msg('修改失败',{icon: 5,time:1000});
            }          
        });

	});
}
/*意见类型-启用*/
function member_start(obj,id){
	layer.confirm('确认要启用吗？',function(index){
		$.get('/admin/comment_type/status',{'status':0,'id':id},function(data){
            if(data == 1){
                $(obj).parents("tr").find(".td-manages").prepend('<a style="text-decoration:none" class="btn btn-xs btn-success" onclick="member_stop(this,'+id+')" href="javascript:;" title="停用"><i class="fa fa-check  bigger-120"></i></a>');
                $(obj).parents("tr").find(".td-status").html('<span class="label label-success radius">启用</span>');
                $(obj).remove();
                layer.msg('启用!',{icon: 6,time:1000});
            }else{
                layer.msg('修改失败',{icon: 6,time:1000});
            }          
        });
	});
}

/*意见类型-删除*/
function member_del(obj,id){
	layer.confirm('确认要删除吗？',{icon:0,},function(index){
        $.get("/admin/comment_type/del",{'id':id},function(data){
        	// alert(data);
        	if(data == 1){
				$(obj).parents("tr").remove();
				layer.msg('已删除!',{icon:1,time:1000});    		
        	}else{	
	        	alert('删除失败,原因:该类下有意见信息');
        	}
		});
	})
}

//面包屑返回值
var index = parent.layer.getFrameIndex(window.name);
parent.layer.iframeAuto(index);
$('.Order_form ,.ads_link').on('click', function(){
	var cname = $(this).attr("title");
	var cnames = parent.$('.Current_page').html();
	var herf = parent.$("#iframe").attr("src");
    parent.$('#parentIframe span').html(cname);
	parent.$('#parentIframe').css("display","inline-block");
    parent.$('.Current_page').attr("name",herf).css({"color":"#4c8fbd","cursor":"pointer"});
	//parent.$('.Current_page').html("<a href='javascript:void(0)' name="+herf+">" + cnames + "</a>");
    parent.layer.close(index);
	
});
function AdlistOrders(id){
	window.location.href = "Ads_list.html?="+id;
};
</script>
<script type="text/javascript">
jQuery(function($) {
				var oTable1 = $('#sample-table').dataTable( {
				"aaSorting": [[ 1, "asc" ]],//默认第几个排序
		"bStateSave": true,//状态保存
		"aoColumnDefs": [
		  //{"bVisible": false, "aTargets": [ 3 ]} //控制列的隐藏显示
		  {"orderable":false,"aTargets":[0,2,4,5,6,7,8]}// 制定列不参与排序
		] } );
				$('table th input:checkbox').on('click' , function(){
					var that = this;
					$(this).closest('table').find('tr > td:first-child input:checkbox')
					.each(function(){
						this.checked = that.checked;
						$(this).closest('tr').toggleClass('selected');
					});
						
				});						
				$('[data-rel="tooltip"]').tooltip({placement: tooltip_placement});
				function tooltip_placement(context, source) {
					var $source = $(source);
					var $parent = $source.closest('table')
					var off1 = $parent.offset();
					var w1 = $parent.width();
			
					var off2 = $source.offset();
					var w2 = $source.width();
			
					if( parseInt(off2.left) < parseInt(off1.left) + parseInt(w1 / 2) ) return 'right';
					return 'left';
				}
			})
</script>