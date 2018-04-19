<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:57:"F:\appnews\public/../application/admin\view\news\add.html";i:1523547340;s:51:"F:\appnews\application\admin\view\public\_meta.html";i:1523204008;s:53:"F:\appnews\application\admin\view\public\_footer.html";i:1522907424;}*/ ?>
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

<article class="page-container">
    <form class="form form-horizontal" id="form-newsadd" url="<?php echo url('admin/news/add'); ?>">
        <div class="row cl">
            <label class="form-label col-xs-4 col-sm-2"><span class="c-red">*</span>文章标题：</label>
            <div class="formControls col-xs-8 col-sm-9">
                <input type="text" class="input-text" value="" placeholder="" id="title" name="title">
            </div>
        </div>
        <div class="row cl">
            <label class="form-label col-xs-4 col-sm-2"><span class="c-red">*</span>简略标题：</label>
            <div class="formControls col-xs-8 col-sm-9">
                <input type="text" class="input-text" value="" placeholder="" id="samll_title" name="small_title">
            </div>
        </div>
        <div class="row cl">
            <label class="form-label col-xs-4 col-sm-2"><span class="c-red">*</span>分类栏目：</label>
            <div class="formControls col-xs-8 col-sm-9"> <span class="select-box">
				<select name="catid" class="select">
                 <?php if(is_array($cats) || $cats instanceof \think\Collection || $cats instanceof \think\Paginator): $i = 0; $__LIST__ = $cats;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
                    <option value="<?php echo $key; ?>"><?php echo $vo; ?></option>
                  <?php endforeach; endif; else: echo "" ;endif; ?>
                </select>
				</span>
            </div>
        </div>
        <div class="row cl">
            <label class="form-label col-xs-4 col-sm-2"><span class="c-red">*</span>文章摘要：</label>
            <div class="formControls col-xs-8 col-sm-9">
                <textarea name="description" cols="" rows="" class="textarea"  placeholder="说点什么...最少输入10个字符" datatype="*10-100" dragonfly="true" nullmsg="备注不能为空！" ></textarea>
                <p class="textarea-numberbar"><em class="textarea-length">0</em>/200</p>
            </div>
        </div>
        <div class="row cl">
            <label class="form-label col-xs-4 col-sm-2">允许评论：</label>
            <div class="formControls col-xs-8 col-sm-9 skin-minimal">
                <div class="check-box">
                    <input type="checkbox" id="is_allowcomments" name="is_allowcomments" value="1">
                </div>
            </div>
        </div>
        <div class="row cl">
            <label class="form-label col-xs-4 col-sm-2">是否推荐到首页头图：</label>
            <div class="formControls col-xs-8 col-sm-9 skin-minimal">
                <div class="check-box">
                    <input type="checkbox" id="is_head_figure" name="is_head_figure" value="1">
                </div>
            </div>
        </div>
        <div class="row cl">
            <label class="form-label col-xs-4 col-sm-2">是否推荐：</label>
            <div class="formControls col-xs-8 col-sm-9 skin-minimal">
                <div class="check-box">
                    <input type="checkbox" id="is_position" name="is_position" value="1">
                </div>
            </div>
        </div>
        <div class="row cl">
            <label class="form-label col-xs-4 col-sm-2">缩略图：</label>
            <div class="formControls col-xs-8 col-sm-9">
                <input id="file_upload"  type="file" multiple="true" >
                <img style="display: none" id="upload_org_code_img" src="" width="150" height="150">
                <input id="file_upload_image" name="image" type="hidden" multiple="true" value="">
            </div>
        </div>
        <div class="row cl">
            <label class="form-label col-xs-4 col-sm-2">文章内容：</label>
            <div class="formControls col-xs-8 col-sm-9">
                <script id="editor" type="text/plain" name="content"></script>
            </div>
        </div>
        <div class="row cl">
            <div class="col-xs-8 col-sm-9 col-xs-offset-4 col-sm-offset-2">
                <button  class="btn btn-secondary radius" type="submit"><i class="Hui-iconfont">&#xe632;</i> 保存</button>
                <button onClick="removeIframe();" class="btn btn-default radius" type="button">&nbsp;&nbsp;取消&nbsp;&nbsp;</button>
            </div>
        </div>
    </form>
</article>

<script type="text/javascript" src="/public/static/h-uiadmin/lib/jquery/1.9.1/jquery.min.js"></script> 
<script type="text/javascript" src="/public/static/h-uiadmin/lib/layer/2.4/layer.js"></script>
<script type="text/javascript" src="/public/static/h-uiadmin/static/h-ui/js/H-ui.min.js"></script>
<script type="text/javascript" src="/public/static/h-uiadmin/static/h-ui.admin/js/H-ui.admin.js"></script>
<script type="text/javascript" src="/public/static/admin/js/common.js" charset="utf-8"></script>
<script type="text/javascript" src="/public/static/h-uiadmin/lib/layui/layui.js"></script>
<script type="text/javascript" src="/public/static/h-uiadmin/lib/jquery.validation/1.14.0/jquery.validate.js"></script>
<script type="text/javascript" src="/public/static/h-uiadmin/lib/jquery.validation/1.14.0/validate-methods.js"></script>
<script type="text/javascript" src="/public/static/h-uiadmin/lib/jquery.validation/1.14.0/messages_zh.js"></script>
<script type="text/javascript" src="/public/static/h-uiadmin/lib/ueditor/1.4.3/ueditor.config.js"></script>
<script type="text/javascript" src="/public/static/h-uiadmin/lib/ueditor/1.4.3/ueditor.all.min.js"> </script>
<script type="text/javascript" src="/public/static/h-uiadmin/lib/ueditor/1.4.3/lang/zh-cn/zh-cn.js"></script>
<script type="text/javascript" src="/public/static/admin/uploadify/jquery.uploadify.js"></script>
<script type="text/javascript">

    $(function () {

        var ue = UE.getEditor('editor');

        //添加CheckBox的css样式
        $('.skin-minimal input').iCheck({
            checkboxClass: 'icheckbox-blue',
            radioClass: 'iradio-blue',
            increaseArea: '20%'
        });

        //添加主要内容的css
        $('#editor').css({
            "width" : "100%",
            "height" : "300px"
        });

        //图片上传
        $('#file_upload').uploadify({
            swf : swf,
            uploader : image_upload_url,
            'buttonText' : '图片上传',
            'fileTypeDesc' : 'Image files',
            'fileObjName' : 'file',
            'fileTypeExts' : '*.gif; *.jpg; *.png',
            'onUploadSuccess' : function(file, data, response) {
                if (response) {
                    var obj = JSON.parse(data);
                    $('#upload_org_code_img').attr("src", obj.data);
                    $('#file_upload_image').attr("value", obj.data);
                    $('#upload_org_code_img').show();
                }
            }
        });

        //表单验证
        $('#form-newsadd').validate({
            rules:{
                title:{
                    required:true
                },
                small_title:{
                    required:true
                },
                catid:{
                    required:true
                },
                description:{
                    minlength:10,
                    required:true
                }
            },
            onkeyup:false,
            focusCleanup:true,
            success:"valid",
            submitHandler:function(form){
                appnews_save(form);
            }
        });
    });

</script>
</body>
</html>