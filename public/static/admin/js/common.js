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
            WdatePicker({dataFmt:'yyyy-MM-dd HH:mm',maxDate:endTime});
        }else {
            WdatePicker({dataFmt:'yyyy-MM-dd HH:mm'});
        }
    }else {
        var startTime = $("#countTimeStart").val();
        if (startTime != "") {
            WdatePicker({dateFmt:'yyyy-MM-dd HH:mm',minDate:startTime});
        }else {
            WdatePicker({dateFmt:'yyyy-MM-dd HH:mm'})
        }
    }
}