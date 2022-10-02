<script type="text/javascript">

	$(document).ready(function(){
		$("#loginForm").on('submit',function(e){
			e.preventDefault();
			
			console.log($(this).serializeArray());

			$.ajax({
				type: "POST",
				url: "login-function.php",
				data:new FormData(this),
				dataType: "json",
				contentType: false,
				cache: false,
				processData: false,

				success:function(response){

					console.log(response);

					if(response.status == true){

						toastr.success(response.message);
						window.location = 'index.php';

					}else{

						if(response.inputred == "userred"){

							var username = document.getElementById("username");
        					username.style.borderColor = "red";
        					var password = document.getElementById("password");
	        				password.style.borderColor = "blue";

        					toastr.error(response.message);	


						}else if(response.inputred == "passred"){

							var password = document.getElementById("password");
	        				password.style.borderColor = "red";
	        				var username = document.getElementById("username");
        					username.style.borderColor = "blue";
        			
	        				toastr.error(response.message);

						}else if(response.inputred == "allblue"){

							var username = document.getElementById("username");
        					username.style.borderColor = "red";
        					var password = document.getElementById("password");
	        				password.style.borderColor = "red";
	
	        				toastr.error(response.message);

						}else{

							var username = document.getElementById("username");
        					username.style.borderColor = "red";
        					var password = document.getElementById("password");
	        				password.style.borderColor = "red";

	        				//document.getElementById("error").innerHTML = response.message;
							toastr.error(response.message);
	

						}

					}
					
				}

			})
		})
	})
	
</script>