<!DOCTYPE HTML>
<html>
<head>
<meta charset="utf-8">
<meta name="renderer" content="webkit|ie-comp|ie-stand">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no" />
<meta http-equiv="Cache-Control" content="no-siteapp" />
 <link href="/style/admin/assets/css/bootstrap.min.css" rel="stylesheet" />
        <link rel="stylesheet" href="/style/admin/css/style.css"/>       
        <link rel="stylesheet" href="/style/admin/assets/css/ace.min.css" />
        <link rel="stylesheet" href="/style/admin/assets/css/font-awesome.min.css" />
        <link href="/style/admin/Widget/icheck/icheck.css" rel="stylesheet" type="text/css" />
        <!--[if IE 7]>
          <link rel="stylesheet" href="/style/admin/assets/css/font-awesome-ie7.min.css" />
        <![endif]-->
        <!--[if lte IE 8]>
          <link rel="stylesheet" href="/style/admin/assets/css/ace-ie.min.css" />
        <![endif]-->
        <script src="/style/admin/js/jquery-1.9.1.min.js"></script>
        <script src="/style/admin/assets/js/bootstrap.min.js"></script>
<title>添加产品分类</title>
</head>
<body>
<div class="type_style">
  <div class="type_content">
  <form action="/admin/GoodsLabel" method="post" enctype="multipart/form-data" class="form form-horizontal" id="form-user-add">
    <div class="Operate_cont clearfix">
      <label class="form-label"><span class="c-red">*</span>分类名称：</label>
      <div class="formControls ">
        <input type="text" class="input-text" value="" placeholder="" id="user-name" name="name">
      </div>
    </div>
     <div class="Operate_cont clearfix">
      <label class="form-label" style="width: 100px; margin-left: -20px;"><span class="c-red">*</span>分类类型：</label>
      <div class="formControls " style="padding-left: 10px;">
        <input type="radio" class="input-text" value="1" placeholder="" id="user-name" name="type">&nbsp;接待商&nbsp;
        <input type="radio" class="input-text" value="2" placeholder="" id="user-name" name="type">&nbsp;品牌&nbsp;
        <input type="radio" class="input-text" value="4" placeholder="" id="user-name" name="type">&nbsp;景点&nbsp;
        <input type="radio" class="input-text" value="3" checked placeholder= "" id="user-name" name="type">&nbsp;其他
        
      </div>
    </div>
    <div class="Operate_cont clearfix">
      <label class="form-label"><span class="c-red">*</span>父分类：</label>
      <div class="formControls ">
        <select name="pid" id="pid_select" class="input-text" style="margin-left: 10px;">
          <option value="0">--顶级分类--</option>
          <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $v): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
          <option value="<?php echo e($v->id); ?>"><?php echo e($v->name); ?></option>
          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </select>
      </div>
    </div> 
     <div class="Operate_cont clearfix" id="searchTop_box">
      <label class="form-label" style="width: 110px; margin-left: -30px;"><span class="c-red">*</span>搜索顶级分类：</label>
      <div class="formControls" style="padding-left: 10px;">
        <input type="radio" class="input-text" value="1" placeholder="" id="user-name" name="is_searchTop">&nbsp;是&nbsp;
        <input type="radio" class="input-text" checked value="0" placeholder="" id="user-name" name="is_searchTop">&nbsp;否&nbsp;   
      </div>
    </div>
    <div class="">
     <div class="" style=" text-align:center" id="btn_box">
      <?php echo e(csrf_field()); ?>

      <input class="btn btn-primary radius" type="submit" value="提交">
      </div>
    </div>
  </form>
  </div>
</div> 
</div>
<script type="text/javascript" src="/style/admin/Widget/icheck/jquery.icheck.min.js"></script> 
<script type="text/javascript" src="Widget/Validform/5.3.2/Validform.min.js"></script>
<script type="text/javascript" src="/style/admin/assets/layer/layer.js"></script>
<script type="text/javascript" src="/style/admin/js/H-ui.js"></script> 
<script type="text/javascript" src="/style/admin/js/H-ui.admin.js"></script>
<script type="text/javascript">
$(function(){
    $('.skin-minimal input').iCheck({
        checkboxClass: 'icheckbox-blue',
        radioClass: 'iradio-blue',
        increaseArea: '20%'
    });
    
    $("#form-user-add").Validform({
        tiptype:2,
        callback:function(form){
            form[0].submit();
            var index = parent.layer.getFrameIndex(window.name);
            parent.$('.btn-refresh').click();
            parent.layer.close(index);
        }
    });
});

$('#user-name').focus(function(){
  $(this).parent().next().html('');
});

// 获取serachTop_box，保存起来
var searchTop_box = $('#searchTop_box');



// 获取原有的其他正常分类 option
var pid_select_html = $('#pid_select').html();

$('input[name=type]').change(function(){
  var type = $(this).val();
  // 清空选项的值
  $('#pid_select').empty();
  // 删除searchTop_box
$('#searchTop_box').remove();

  switch(type){
    case '1':
      // 接待商
      $('<option value="10">接待商</option>').appendTo($('#pid_select'));
      break;
    case '2':
      // 品牌
      $('<option value="11">品牌</option>').appendTo($('#pid_select'));
      break;
    case '3':
      $('#pid_select').html(pid_select_html);
      searchTop_box.insertBefore($('#btn_box'));
      break;
    case '4':
      $('<option value="223">景点</option>').appendTo($('#pid_select'));
      break;
  }
});

</script>
</body>
</html>