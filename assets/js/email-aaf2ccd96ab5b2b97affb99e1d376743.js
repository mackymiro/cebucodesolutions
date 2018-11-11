$(document).ready(function() {
	$(".btn-submit").click(function(){
		var email = $("#email_email").val();
		var name = $("#email_name").val();
		var msg = $("#email_message").val();
		
		$.ajax({
			url: 'email',
			type:'POST',  
			data:	'email=' + email + '&name=' + name + '&msg=' +msg,
			success:function(response){
				if(response == '1'){
					$(".success").show();
				}else{
					$(".success").hide();
				}
			}
		});
		return false;
	});
   return false;
});//end document ready
