//对象继承
Object.extend=function(destination,source){
    for(var property in source){
        destination[property]=source[property];
    }
    return destination;
}
if(document.getElementById('current_url')){
    document.getElementById('current_url').value='http://2.gaosu.com/';
}

var clip = null;  
function $$$(id) {
    return document.getElementById(id);
}
function init(detailid,containerid,btnid,options) {//内容ID，Flash框ID，点击框,提示信息框
    options=Object.extend({
        'fnway':'alert',//默认提示信息为弹出框
        'ispic':'0'
    },options);
    clip = new ZeroClipboard.Client();
    clip.setHandCursor(true);

    clip.addEventListener('mouseOver', function (client) {
        // update the text on mouse over
        if(options.ispic==1){
            clip.setText( $$$(detailid).src);
        }else{
            clip.setText( $$$(detailid).value );
        }
    });

    clip.addEventListener('complete', function (client, text) {
        //debugstr("Copied text to clipboard: " + text );
        //alert("该地址已经复制，你可以使用Ctrl+V 粘贴。");
        if(options.fnway == 'alert'){
            alert("复制成功！");
        }else{
            $$$(options.fnway).innerHTML='复制成功'
        }
    });
    clip.glue(btnid, containerid );
}