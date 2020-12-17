/*验证用户名是否存在*/
jQuery.validator.addMethod("check_username", function (value,element) {
	var is_repeat = check_username(value);
	return is_repeat;
}, "用户名已存在");

function check_username(username){
	var falg = false;
	var controller = $("input[name='controller']").val();
	$.ajax({
		url:'/index.php/admin/'+controller+'/check_username',
		type:'POST',
		async:false,
		datatype:'json',
		data:{username:username},
		success:function(r){
			var re = JSON.parse(r);
			if(re.code == 0){
				falg = false;
			}else{
				falg = true;
			}
		}
	});
	return falg;
}

/*验证昵称是否存在*/
jQuery.validator.addMethod("check_nickname", function (value,element) {
	var is_repeat = check_nickname(value);
	return is_repeat;
}, "昵称已存在");

function check_nickname(nickname){
	var falg = false;
	var controller = $("input[name='controller']").val();
	$.ajax({
		url:'/index.php/admin/'+controller+'/check_nickname',
		type:'POST',
		async:false,
		datatype:'json',
		data:{nickname:nickname},
		success:function(r){
			var re = JSON.parse(r);
			if(re.code == 0){
				falg = false;
			}else{
				falg = true;
			}
		}
	});
	return falg;
}

/*验证手机号*/
jQuery.validator.addMethod("check_phone", function (value, element) {
	var match = /^[1][3,4,5,7,8][0-9]{9}$/;
	return match.test(value);
}, "请输入正确的手机号.");

//时间
function time(){
	setInterval(function(){
		var mydate = new Date();
		var year = mydate.getFullYear();
		var month = mydate.getMonth() + 1 < 10 ? "0" + (mydate.getMonth() + 1) : mydate.getMonth() + 1;
		var day =  mydate.getDate() < 10 ? "0" + mydate.getDate() : mydate.getDate();
		var hour = mydate.getHours()< 10 ? "0" + mydate.getHours() : mydate.getHours();
		var minutes = mydate.getMinutes()< 10 ? "0" + mydate.getMinutes() : mydate.getMinutes();
		var second = mydate.getSeconds()< 10 ? "0" + mydate.getSeconds() : mydate.getSeconds();
		var time = year + '-' + month + '-' + day + ' ' + hour + ':' + minutes + ':' + second;
		$("#today").html(time);
	},1000);
}
time();

function check(obj){
	var name = $(obj).val();
	if ($(obj).prop("checked") == true) {
        // 上面的复选框已被选中
        $("."+name).prop("checked", true);
    } else {
        // 上面的复选框没被选中
        $("."+name).prop("checked", false);
    }
}

function check_child(obj){
	var name = $(obj).attr('f_name');
	var arr = name.split('_');
	var child_name = arr[0];
	var flag = false;
	$("."+child_name).each(function(){
		if($(this).prop("checked") == true){
			flag = true;
		}
	});
	$("."+name).prop("checked", flag);
}

//退出
$('#logout').on('click',function(){
	$.widget("ui.dialog", $.extend({}, $.ui.dialog.prototype, {
			_title: function(title) {
				var $title = this.options.title || '&nbsp;'
				if( ("title_html" in this.options) && this.options.title_html == true )
					title.html($title);
				else title.text($title);
			}
		}));
	var dialog = $( "#logout-message" ).removeClass('hide').dialog({
		modal: true,
		title: "<div class='widget-header widget-header-small'><h4 class='smaller'><i class='ace-icon fa fa-exclamation-triangle red'></i> 退出登录 </h4></div>",
		title_html: true,
		buttons: [ 
			{
				text: "OK",
				"class" : "btn btn-primary btn-minier",
				click: function() {
					$.ajax({
						url:'/admin/login/dologout',
						type:'POST',
						async:false,
					})
					.done(function(r) {
						$( "#logout-message" ).dialog( "close" ); 
						var re = JSON.parse(r);
			            if(re.code == 0){
    		            	$.message({
    	            	        message:re.msg,
    	            	        type:'success'
    	            	    });
			                setTimeout('window.location.href="/admin/login"',500);
			            }
			        });
				} 
			},
			{
				text: "Cancel",
				"class" : "btn btn-minier",
				click: function() {
					$( this ).dialog( "close" ); 
				} 
			}
		]
	});
});