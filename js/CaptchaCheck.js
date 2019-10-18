function check() {
	/* Act on the event */
	var captchaText = $('#captchaText').val();
	var result = false;
	if($('#trackNoTextarea').val() == ''){
		alert('請輸入查詢單號');
	}else{
		$.ajax({
			type:'post',
			url:'../controller/CaptchaCheck.php',
			data:{verify:captchaText},
			async:false,
			datatype:'json',
			success:function(data){
				if(data == 'true'){
					result = true;
				}else
				{
					alert('驗證碼錯誤，請重新輸入');
				}
			}
		});
	}
	return result;
}
$("#imgCode").click(function(){
	$(this).attr("src", "../controller/captcha_code.php");
})