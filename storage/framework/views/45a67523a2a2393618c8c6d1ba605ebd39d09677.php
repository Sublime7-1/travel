
<?php $__env->startSection('title','我的点评'); ?>
<?php $__env->startSection('main'); ?>
<style type="text/css">
    .append_remark:hover{
        color: #f80;
    }
    .comment_btn:hover{
    	color:#ff6700;
    }

    #list{
        padding-left:415px;
    }
    .pagination {
	    clear: both;
	    color: #404040;
	    font-size: 12px;
	    font-weight: 400;
	    height: 40px;
	    margin: 0 auto 8px;
	    padding-right: 0;
	    padding-top: 15px;
	}
   .pagination li{
        display:inline-block;
        float:left;
        
   }  
   .pagination li span {
	    width: 28px;
	    height: 29px;
	    display: block;
	    line-height: 29px;
	}
</style>
<div class="mainDiv">        
    <div class="detail_title clearfix">
        <div class="detail_sub_title fl">
            <i></i>我的点评
        </div>
    </div>
    <div class="common_div">
        <table class="user_table table_order table_newlist" id="comments_list" width="100%" cellspacing="0" cellpadding="0" border="0">
		    <thead>
		        <tr>
		            <th width="380">订单信息</th>
		            <th width="340">我的点评</th>
		            <th width="140">点评时间</th>
		            <th width="100">操作</th>
		        </tr>
		    </thead>
		    <tbody>
		    	<?php if(count($comment)): ?>
		    	<?php $__currentLoopData = $comment; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k=>$v): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
		    	<tr class="even">
		            <td colspan="5" class="order_num">
		                <span class="mr20">订单编号：<?php echo e($v->order_num); ?></span> <span>出游时间：<?php echo e($v->begin_time); ?> ~ <?php echo e($v->end_time); ?></span> 
		            </td>
		        </tr>
		        <tr class="odd">
		            <td class="p_list_1">
		                <div class="pro_des clearfix">
		                    <div>
		                        <img src="<?php echo e($v->pic); ?>" width="30px">
		                    </div>
		                    <p style="margin-left:45px">
		                        <a title="<?php echo e($v->gname); ?>" class="line" target="_blank" href="javascript:void(0);" style="white-space:nowrap;text-overflow:ellipsis;overflow:hidden;width:300px;"><?php echo e($v->gname); ?></a>
		                    </p>
		                </div>
		            </td>
		            <td class="p_list_2">  
		                <p>预订优惠：<span><?php echo e($v->discount_grade); ?></span></p>
		                
		                <p>游玩服务：<span><?php echo e($v->service_grade); ?></span></p>
		                
		                <p>游玩体验：<span><?php echo e($v->experience_grade); ?></span></p>       
		            </td>
	            	<td class="p_list_3"><?php echo e($v->time); ?></td>
		            <td class="p_list_5">
		                <a class="comment_btn" href="/home/commentcheck/<?php echo e($v->id); ?>" target="_blank">查看详情</a>        
		            </td>
	        	</tr>
	        	<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
		    	<?php else: ?>
		        <tr>
		            <td style="border-bottom:none;" colspan="5">
		                <div class="block_div cash_Order clearfix">
		                    <div class="order_list">
		                        <p class="t_cen" style="text-align: center;">
		                            <span class="page_icon icon_niu_b"></span>
		                        </p>
		                        <p class="t_cen no_tip" style="text-align: center;">您最近没有点评记录!</p>
		                    </div>
		                </div>
		            </td>
		        </tr>
		        <?php endif; ?>
		    </tbody>
    	</table>
    </div>
	<div style="margin:0 auto;text-align:center;height: 100px" id="list"><?php echo e($comment->links()); ?></div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('home.member_public.index', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>