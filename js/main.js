$(function(){

//user Registration
	$("#regSubmit").click(function(){

		var name	   = $("#name").val();
		var username   = $("#username").val();
		var password   = $("#password").val();
		var email      = $("#email").val();
		var dataString = 'name='+name+'&username='+username+'&password='+password+'&email='+email;

		$.ajax({

			type:"POST",
			url:"getRegister.php",
			data:dataString,
			success:function(data)
			{
				$("#state").html(data);
				setTimeout(function(){
						$("#state").fadeOut();
					}, 3000);
			}
		});
		return false;
	});

//user Login
	$("#loginSubmit").click(function(){

		var email      = $("#email").val();
		var password   = $("#password").val();
		var dataString = 'email='+email+'&password='+password;

		$.ajax({

			type:"POST",
			url:"getLogin.php",
			data:dataString,
			success:function(data)
			{
				if ($.trim(data) == "empty") 
				{
					$(".empty").show();
					setTimeout(function(){
						$(".empty").fadeOut();
					}, 3000);
				} 
				else if($.trim(data) == "disable")
				{
					$(".disable").show();
					setTimeout(function(){
						$(".disable").fadeOut();
					}, 3000);
				}
				else if($.trim(data) == "error")
				{
					$(".error").show();
					setTimeout(function(){
						$(".error").fadeOut();
					}, 3000);
				}
				else
				{
					window.location = "exam.php";
				}
			}
		});
		return false;
	});
});