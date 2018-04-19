<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:59:"F:\appnews\public/../application/admin\view\news\index.html";i:1523545829;s:51:"F:\appnews\application\admin\view\public\_meta.html";i:1523204008;s:53:"F:\appnews\application\admin\view\public\_footer.html";i:1522907424;}*/ ?>
<!DOCTYPE HTML>
<html>
<head>
<meta charset="utf-8">
<meta name="renderer" content="webkit|ie-comp|ie-stand">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no" />
<meta http-equiv="Cache-Control" content="no-siteapp" />
<link rel="Bookmark" href="/favicon.ico" >
<link rel="Shortcut Icon" href="/favicon.ico" />
<!--[if lt IE 9]>
<script type="text/javascript" src="/public/static/h-uiadmin/lib/html5shiv.js"></script>
<script type="text/javascript" src="/public/static/h-uiadmin/lib/respond.min.js"></script>
<![endif]-->
<link rel="stylesheet" type="text/css" href="/public/static/h-uiadmin/static/h-ui/css/H-ui.min.css" />
<link rel="stylesheet" type="text/css" href="/public/static/h-uiadmin/static/h-ui.admin/css/H-ui.admin.css" />
<link rel="stylesheet" type="text/css" href="/public/static/h-uiadmin/lib/Hui-iconfont/1.0.8/iconfont.css" />
<link rel="stylesheet" type="text/css" href="/public/static/h-uiadmin/static/h-ui.admin/skin/default/skin.css" id="skin" />
<link rel="stylesheet" type="text/css" href="/public/static/h-uiadmin/static/h-ui.admin/css/style.css" />
<!--[if IE 6]>
<script type="text/javascript" src="/public/static/h-uiadmin/lib/DD_belatedPNG_0.0.8a-min.js" ></script>
<script>DD_belatedPNG.fix('*');</script>
<![endif]-->
<link rel="stylesheet" href="/public/static/h-uiadmin/lib/layui/css/layui.css" media="all">
<link rel="stylesheet" type="text/css" href="/public/static/admin/uploadify/uploadify.css" />
<script type="text/javascript">
    swf = '/public/static/admin/uploadify/uploadify.swf';
    image_upload_url = "<?php echo url('admin/image/upload'); ?>";
</script>

<nav class="breadcrumb"><i class="Hui-iconfont">&#xe67f;</i> 首页 <span class="c-gray en">&gt;</span> 娱乐新闻管理 <span class="c-gray en">&gt;</span> 新闻列表 <a class="btn btn-success radius r" style="line-height:1.6em;margin-top:3px" href="javascript:location.replace(location.href);" title="刷新" ><i class="Hui-iconfont">&#xe68f;</i></a></nav>
<div class="page-container">
    <div class="text-c">
        <form action="<?php echo url('admin/news/index'); ?>" method="get">
            <span class="select-box inline">
                <select name="catid" class="select">
                    <option value="0">全部分类</option>
                    <?php if(is_array($cats) || $cats instanceof \think\Collection || $cats instanceof \think\Paginator): $i = 0; $__LIST__ = $cats;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
                    <option value="<?php echo $key; ?>"
                    <?php if($key == $catid): ?> selected="selected"<?php endif; ?>><?php echo $vo; ?></option>
                    <?php endforeach; endif; else: echo "" ;endif; ?>
                </select>
            </span> 日期范围：
            <input type="text" name="start_time" class="input-text" id="countTimeStart" onfocus="selecttime(1)" value="<?php echo $start_time; ?>" style="width:120px;" >
            -
            <input type="text" name="end_time" class="input-text" id="countTimeEnd" onfocus="selecttime(0)" value="<?php echo $end_time; ?>"  style="width:120px;">
            <input type="text" name="title" id="" value="<?php echo $title; ?>" placeholder=" 新闻名称" style="width:250px" class="input-text">
            <button name="" id="" class="btn btn-success" type="submit"><i class="Hui-iconfont">&#xe665;</i> 搜新闻</button>
        </form>
    </div>

    <div class="mt-20">
        <table class="table table-border table-bordered table-bg table-hover table-sort table-responsive" >
            <thead>
                <tr class="text-c">
                    <th width="10%">ID</th>
                    <th width="25%">标题</th>
                    <th width="10%">分类</th>
                    <th width="10%">缩图</th>
                    <th width="15%">更新时间</th>
                    <th width="10%">是否推荐</th>
                    <th width="10%">发布状态</th>
                    <th width="10%">操作</th>
                </tr>
            </thead>
            <tbody>
            <?php if(is_array($news) || $news instanceof \think\Collection || $news instanceof \think\Paginator): $i = 0; $__LIST__ = $news;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
                <tr class="text-c">
                    <td><?php echo $vo['id']; ?></td>
                    <td class="text-c"><u style="cursor:pointer" class="text-primary"  title="查看"><?php echo $vo['title']; ?></u></td>
                    <td><?php echo getCatName($vo['catid']); ?></td>
                    <td><img width="60" height="60" class="picture-thumb" src="<?php echo $vo['image']; ?>"></td>
                    <td><?php echo $vo['update_time']; ?></td>
                    <td><?php echo getIsYesOrNo($vo['is_position']); ?></td>
                    <td class="td-status"><?php echo getStatus($vo['id'], $vo['status']); ?></td>
                    <td class="f-14 td-manage">
                        <a style="text-decoration:none" class="ml-5" onClick="app_edit(this)" href="javascript:;" title="编辑新闻" edit_url="<?php echo url('admin/news/edit',['id' => $vo['id']]); ?>"><i class="Hui-iconfont">&#xe6df;</i></a>
                        <a style="text-decoration:none" class="ml-5" onClick="app_del(this)" href="javascript:;" title="删除" del_url="<?php echo url('admin/news/delete',['id'=>$vo['id']]); ?>"><i class="Hui-iconfont">&#xe6e2;</i></a>
                    </td>
                </tr>
            <?php endforeach; endif; else: echo "" ;endif; ?>
            </tbody>
        </table>
        <div class="text-c mt-30">
            <div id="laypage"></div>
        </div>
    </div>
</div>

<script type="text/javascript" src="/public/static/h-uiadmin/lib/jquery/1.9.1/jquery.min.js"></script> 
<script type="text/javascript" src="/public/static/h-uiadmin/lib/layer/2.4/layer.js"></script>
<script type="text/javascript" src="/public/static/h-uiadmin/static/h-ui/js/H-ui.min.js"></script>
<script type="text/javascript" src="/public/static/h-uiadmin/static/h-ui.admin/js/H-ui.admin.js"></script>
<script type="text/javascript" src="/public/static/admin/js/common.js" charset="utf-8"></script>
<script type="text/javascript" src="/public/static/h-uiadmin/lib/layui/layui.js"></script>

<script type="text/javascript" src="/public/static/h-uiadmin/lib/My97DatePicker/4.8/WdatePicker.js"></script>
<script type="text/javascript" src="/public/static/h-uiadmin/lib/datatables/1.10.0/jquery.dataTables.min.js"></script>
<script type="text/javascript">

    //layui分页功能的调用
    layui.use(['laypage','layer'],function () {

        var laypage = layui.laypage;
        var layer = layui.layer;
        var url = "<?php echo url('admin/news/index'); ?>" + "?<?php echo $query; ?>";

        laypage.render({
            elem: 'laypage'
            ,count: '<?php echo $total; ?>'
            ,limit: '<?php echo $size; ?>'
            , theme: '#1E9FFF'
            ,curr : '<?php echo $curr; ?>'
            ,layout: ['prev', 'page', 'next', 'skip']
            ,jump: function(e, first){ //触发分页后的回调
                if(!first){ //一定要加此判断，否则初始时会无限刷新
                    location.href = url + '&page='+e.curr;
                }
            }
        });
    });

    /**
     * 新闻编辑操作
     * @param obj
     */
    function app_edit(obj) {
        url = $(obj).attr('edit_url');
        title = $(obj).attr('title');
        var index = layer.open({
            type : 2,
            title : title,
            content : url
        });
        layer.full(index);
    }

</script>
</body>
</html>