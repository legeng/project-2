/* common function library */
if(!String.prototype.trim) String.prototype.trim = function(){
    return this.replace(/^\s+|\s+$/g,'');
}
if (!Array.prototype.map) Array.prototype.map = function(callback, thisArg) {
    var T, A, k;  
    if (this == null) throw new TypeError(" this is null or not defined");
    var O = Object(this);
    var len = O.length >>> 0;
    if ({}.toString.call(callback) != "[object Function]")
        throw new TypeError(callback + " is not a function");
    if (thisArg) T = thisArg;
    A = new Array(len);
    k = 0;
    while(k < len) {
        var kValue, mappedValue;  
        if (k in O) {
            kValue = O[k];
            mappedValue = callback.call(T, kValue, k, O);  
            A[k] = mappedValue;  
        }  
        k++;  
    }
    return A;  
}
function $(){
    if (arguments.length > 1) {
        for (var i = 0, elements = [], length = arguments.length; i < length; i++)
            elements.push($(arguments[i]));
        return elements;
    }
    return typeof arguments[0] === "string" ? document.getElementById(arguments[0]) : arguments[0]; 
}
function addEvent(elem, event, handler){
    elem = $(elem);
    elem.attachEvent ? elem.attachEvent("on" + event, handler) : elem.addEventListener(event, handler, false);
}
function removeEvent(elem, event, handler){
    elem = $(elem);
    elem.detachEvent ? elem.detachEvent("on" + event, handler) : elem.removeEventListener(event, handler, false);
}
function fireEvent(elem, event){
    elem = $(elem);
    switch(event.toLowerCase()){
        case "mousewheel":
            if(navigator.userAgent.indexOf("Gecko/") > -1) event = "DOMMouseScroll";
            break;
        case "focus":
            window.setTimeout(function(){
                elem.focus()
            }, 0);
            return;
        case "submit":
            window.setTimeout(function(){
                elem.submit()
            }, 0);
            return;
    }
    if(elem.fireEvent) {
        elem.fireEvent("on" + event);
    }else{
        var ev = document.createEvent("HTMLEvents");
        ev.initEvent(event, false, true);
        elem.dispatchEvent(ev);
    }
    return;
}
function stopPropagation(event){
    event.stopPropagation ? event.stopPropagation() : event.cancelBubble = true;
}
function preventDefault(event){
    event.preventDefault ? event.preventDefault() : event.returnValue = false;
}
/*RGB颜色转换为16进制*/
String.prototype.colorHex = function(){
    var reg = /^#([0-9a-fA-f]{3}|[0-9a-fA-f]{6})$/;
    var that = this;
    if(/^(rgb|RGB)/.test(that)){
        var aColor = that.replace(/(?:\(|\)|rgb|RGB)*/g,"").split(",");
        var strHex = "#";
        for(var i=0; i<aColor.length; i++){
            var hex = Number(aColor[i]).toString(16);
            if(hex === "0"){
                hex += hex;	
            }
            strHex += hex;
        }
        if(strHex.length !== 7){
            strHex = that;	
        }
        return strHex;
    }else if(reg.test(that)){
        var aNum = that.replace(/#/,"").split("");
        if(aNum.length === 6){
            return that;	
        }else if(aNum.length === 3){
            var numHex = "#";
            for(var i=0; i<aNum.length; i+=1){
                numHex += (aNum[i]+aNum[i]);
            }
            return numHex;
        }
    }else{
        return that;	
    }
};
/*16进制颜色转为RGB格式*/
String.prototype.colorRgb = function(){
    var reg = /^#([0-9a-fA-f]{3}|[0-9a-fA-f]{6})$/;
    var sColor = this.toLowerCase();
    if(sColor && reg.test(sColor)){
        if(sColor.length === 4){
            var sColorNew = "#";
            for(var i=1; i<4; i+=1){
                sColorNew += sColor.slice(i,i+1).concat(sColor.slice(i,i+1));	
            }
            sColor = sColorNew;
        }
        //处理六位的颜色值
        var sColorChange = [];
        for(var i=1; i<7; i+=2){
            sColorChange.push(parseInt("0x"+sColor.slice(i,i+2)));	
        }
        return "RGB(" + sColorChange.join(",") + ")";
    }else{
        return sColor;	
    }
};
/* user code */
/* base class */
function generate(){
    this.error = []
    this.string = "";
    this._isMail = function(mail){
        var mailreg = /^([a-zA-Z0-9]+[_|\_|\.]?)*[a-zA-Z0-9]+@([a-zA-Z0-9]+[_|\_|\.]?)*[a-zA-Z0-9]+\.[a-zA-Z]{2,3}$/;
        if(mailreg.test(mail)){
            return 1;
        }else{
            return 0;
        }
    }
    this._isTeleNum = function(tel){
        var telreg = /^(13[0-9]{9})|(15[89][0-9]{8})$/;
        if(telreg.test(tel)){
            return 1;
        }else{
            return 0;
        }
    }
    this._isUrl = function(url){
        var urlreg = "^((https|http|ftp|rtsp|mms)?://)" 
        + "?(([0-9a-z_!~*'().&=+$%-]+: )?[0-9a-z_!~*'().&=+$%-]+@)?"
        + "(([0-9]{1,3}.){3}[0-9]{1,3}"  
        + "|" 
        + "([0-9a-z_!~*'()-]+.)*" 
        + "([0-9a-z][0-9a-z-]{0,61})?[0-9a-z]." 
        + "[a-z]{2,6})" 
        + "(:[0-9]{1,4})?" 
        + "((/?)|" 
        + "(/[0-9a-z_!~*'().;?:@&=+$,%#-]+)+/?)$";
        var reg=new RegExp(urlreg); 
        if(reg.test(url)){
            return 1;
        }else{
            return 0;
        }
    }
    this.getString = function(){
        return this.string;
    }
    this.getError = function(){
        return this.error;
    }
}
/* card class */
function Mode_card(){
    generate.apply(this);
    var n = $("card_n").value.trim();
    var org = $("card_org").value.trim();
    var til = $("card_til").value.trim();
    var tel = $("card_tel").value.trim();
    var url = $("card_url").value.trim();
    var mail = $("card_mail").value.trim();
    var adr = $("card_adr").value.trim();
    if(!n) this.error.push("姓名不能为空!");
    if(!tel) this.error.push("电话号码不能为空!");
    //if(!this._isTeleNum(tel)) this.error.push("无效的电话号码！");
    //    if(!org) this.error.push("单位不能为空!");
    //    if(!til) this.error.push("职位不能为空!");
    //    if(!url) this.error.push("网址不能为空!");
    //    if(!this._isUrl(url)) this.error.push("无效的网址");
    //    if(!mail) this.error.push("邮箱不能为空!");
    //    if(!this._isMail(mail)) this.error.push("无效的邮箱!");
    //    if(!adr) this.error.push("地址不能为空!");
    this.string = "MECARD:";
    if(n) this.string += "N:" + n + ";";
    if(org) this.string += "ORG:" + org + ";";
    if(til) this.string += "TIL:" + til + ";";
    if(tel) this.string += "TEL:" + tel + ";";
    if(url) this.string += "URL:" + url + ";";
    if(mail) this.string += "EMAIL:" + mail + ";";
    if(adr) this.string += "ADR:" + adr + ";";
}
/* url class */
function Mode_url(){
    generate.apply(this);
    var url = $("url_url").value.trim();
    if(!url) this.error.push("网址不能为空!");
    //if(!this._isUrl(url)) this.error.push("无效网址!");
    this.string = url;
}
/* mail class */
function Mode_mail(){
    generate.apply(this);
    var mail = $("mail_mail").value.trim();
    if(!mail) this.error.push("邮箱不能为空!");
    //if(!this._isMail(mail)) this.error.push("无效邮箱!");
    this.string = mail;
}
/* telephone class */
function Mode_telephone(){
    generate.apply(this);
    var tel = $("telephone_tel").value.trim();
    if(!tel) this.error.push("电话号码不能为空!");
    //if(!this._isTeleNum(tel)) this.error.push("无效电话号码!");
    this.string = 'tel:'+tel;
}
/* sms class */
function Mode_sms(){
    generate.apply(this);
    
    var tel = $("sms_tel").value.trim();
    if(!tel) this.error.push("电话号码不能为空!");
    //if(!this._isTeleNum(tel)) this.error.push("无效电话号码!");
    var sms = $("sms_sms").value.trim();
    if(!sms) this.error.push("短信不能为空!");
    
    if(tel) this.string += "smsto:" + tel + ":";
    if(sms)this.string += sms;
}
/* text class */
function Mode_text(){
    generate.apply(this);
    var text = $("text_text").value.trim();
    if(!text) this.error.push("文本不能为空!");
    this.string = text;
}
/* wifi class */
function Mode_wifi(){
    generate.apply(this);
    var wifi = $("text_text").value.trim();
    var ssid = $("wifi_ssid").value.trim();
    var ssidt = $("wifi_t").value.trim();
    var wifip = $("wifi_p").value.trim();
    this.string = "WIFI:";
    if(ssid) this.string += "S:" + ssid + ";";
    if(ssidt) this.string += "T:" + ssidt + ";";
    if(wifip) this.string += "P:" + wifip + ";";
}
function onload(){

    $("card","url","mail","telephone","sms","text","wifi").map(function(e){
        e.style.display="none"
    });
    $("text").style.display="block"
    
    Array.prototype.map.call($("datatype").getElementsByTagName("A"), function(elem){
        addEvent(elem, "click", function(event){
            var target =  event.target || event.srcElement;
            
            if(target.name){
                $("card","url","mail","telephone","sms","text","wifi").map(function(e){
                    e.style.display="none"
                });
                $(target.name.replace("nav_","")).style.display = "block";
        
                Array.prototype.map.call($("datatype").getElementsByTagName("LI"), function(el){
                    el.className="";
                });
                target.parentNode.parentNode.className ="hover";
            }
        })
    })

    addEvent("qrcodeform", "submit", function(event){
        stopPropagation(event);
        preventDefault(event);
        var type = null;
        $("card","url","mail","telephone","sms","text","wifi").map(function(e){
            if(e.style.display == 'block'){
                type = e.id;
            }
        });
        var object = new window["Mode_"+type];
        if(object.getError().length){
            //alert(object.getError().join("\n"));
            //$('bigcode').innerHTML='<div class="note">'+object.getError().join("<br/>")+'</div>';
            $('bigcode').innerHTML='<div class="note">你还没有填写内容</div>';
        }else{
            if(object.getString()){
                var bg=$('bg').style.backgroundColor;
                if(bg.indexOf('rgb') != -1){
                    bg=bg.colorHex();
                }else{
                    bg=bg.colorRgb();
                    bg=bg.colorHex();
                }
                var bgcolor=bg.replace('#','');
                
                var fg=$('fg').style.backgroundColor;
                if(fg.indexOf('rgb') != -1){
                    fg=fg.colorHex();
                }else{
                    fg=fg.colorRgb();
                    fg=fg.colorHex();
                }
                var fgcolor=fg.replace('#','');
                
                var colorParam=(bgcolor.length==6 && fgcolor.length==6) ? '&bg='+bgcolor+'&fg='+fgcolor : '';
                
                var uri="http://www.liantu.com/api.php?text=" + encodeURIComponent(object.getString())+colorParam;
                $('bigcode').innerHTML='<a href="'+uri+'" target="_blank"><img src="'+uri+'" id="qrcodeimg"/></a>'
            }else{
                $('bigcode').innerHTML='<div class="fail">生成失败</div>';
            }
            $("qrcodeimg").onload = function(){
                $('bigcode').style.textAlign ='center';
                //ie6运行，兼容max-width
                if(!-[1,]&&!window.XMLHttpRequest){
                    this.style.width='auto';
                    if(this.width>300){
                        this.style.width='300px';
                    }
                }
                if(!!window.ActiveXObject && !!document.documentMode){
                    if(this.width>=300){
                        $('bigcode').style.textAlign ='left';
                    }
                }
            };            
        }
    });
    
    //限制文字长度
    addEvent($("text_text"),'keyup',function(){
        chageSize($("text_text"),422);
    });
    addEvent($("sms_sms"),'keyup',function(){
        chageSize($("sms_sms"),140,$('sms_size'));
    });
}

/*文字长度限制*/
function chageSize(obj,max,addobj){//对象文字长度，最大长度，添加到对象
    if(obj.value.length>max){
        obj.value = obj.value.substring(0,max);
    }
    var size=max-(obj.value.length);
    if(addobj){
        addobj.innerHTML=size;
    }
}

onload();

document.body.onload=function(){
    $('qrcodeform').reset();
}
//初使化图片大小
if(!-[1,]&&!window.XMLHttpRequest){
    $("qrcodeimg").style.width='300';
}
//百度分享

//addEvent(window, "load", onload);

//以下为jquery方法
(function($){
    $('#text_text').focus();
    $('.iColorPicker').keyup(function(){
        var color=$(this).val(); 
        $(this).val($(this).val().replace(/[^#a-fA-F0-9]/,''));                 
        if(color.length==1 && color != '#'){
            $(this).val(color.replace(/[^#]/,'#'));
        }
        if(color.length==7){
            if(/#[a-fA-F0-9]{6}/i.test(color)){
                $(this).css('background',color);
            }else{
                if($(this).attr('id') == 'bg'){
                    $(this).val('#ffffff');
                    $(this).css('background','#ffffff');
                }else{
                    $(this).val('#000000');
                    $(this).css('background','#000000');
                }
            }
        }
    })  
    
    $('#savepic').click(function(){
        var uri=$('#qrcodeimg').attr('src');
        location.href='/saveqr.php?url='+encodeURIComponent(uri);
    })
})(jQuery)
