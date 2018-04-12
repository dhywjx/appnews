/**
 * 公共的js
 * Created by asus on 2018/4/3.
 */

/**
 * 时间选择插件适配
 * @param flag //起始1 终止0 类别
 */
function selecttime(flag){
    if (flag == 1) {
        var endTime = $("#countTimeEnd").val();
        if (endTime != "") {
            WdatePicker({dataFmt:'yyyy-MM-dd',maxDate:endTime});
        }else {
            WdatePicker({dataFmt:'yyyy-MM-dd'});
        }
    }else {
        var startTime = $("#countTimeStart").val();
        if (startTime != "") {
            WdatePicker({dateFmt:'yyyy-MM-dd',minDate:startTime});
        }else {
            WdatePicker({dateFmt:'yyyy-MM-dd'})
        }
    }
}

/**
 * 通用化的from表单提交
 * @param form
 */
function appnews_save(form) {
    var data = $(form).serialize();
    url = $(form).attr('url');
    $.post(url, data, function (result) {
        if (result.code == 0) {
            layer.msg(result.msg, {icon: 5, time: 2000});
        }else if (result.code == 1) {
            layer.msg(result.msg, {icon: 6, time: 2000});
            location.reload();
        }
    }, 'JSON');
}

/**
 * 通用化的修改状态的操作
 * @param obj
 */
function app_status(obj) {
    url = $(obj).attr('status_url');
    layer.confirm('确认要修改吗？',function (index) {
        $.ajax({
            type: 'POST',
            url: url,
            dataType: 'json',
            success:function (data) {
                if (data.code == 1) {
                    layer.msg(data.msg, {icon: 1, time: 2000});
                    self.location = data.data.jump_url;
                }else if (data.code == 0) {
                    layer.msg(data.msg, {icon: 2, time: 2000});
                }
            },
            error:function (data) {
                console.log(data.msg);
            }
        });
    });
}

/**
 * 通用化的from表单修改
 * @param form
 */
function appnews_update(form) {
    var data = $(form).serialize();
    url = $(form).attr('url');
    $.post(url,data,function (result) {
        if (result.code == 0) {
            layer.msg(result.msg, {icon: 5, time: 2000});
        }else if(result.code == 1){
            window.parent.location.reload(); //刷新父页面
            var index = parent.layer.getFrameIndex(window.name); //获取窗口索引
            parent.layer.close(index);  // 关闭layer
            layer.msg(result.msg, {icon: 1, time: 2000});
        }
    },'JSON');
}

/**
 * 通用化的删除状态的操作
 * @param obj
 */
function app_del(obj){
    url = $(obj).attr('del_url');
    layer.confirm('确认要删除吗？',function(index){
        $.ajax({
            type: 'POST',
            url: url,
            dataType: 'json',
            success: function(data){
                if (data.code == 1) {
                    layer.msg(data.msg, {icon: 1, time: 2000});
                    self.location = data.data.jump_url;
                }else if (data.code == 0) {
                    layer.msg(data.msg, {icon: 2, time: 2000});
                }
            },
            error:function(data) {
                console.log(data.msg);
            },
        });
    });
}