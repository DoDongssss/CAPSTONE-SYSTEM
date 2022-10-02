<?php
    include "connect.php";
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Java Sript Extension -->
	 <script src = "https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	 <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
	 <!-- Toastr Extension -->
	 <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
	 <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    <!-- Font-awesome cndjs -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css">

    <link rel="stylesheet" href="css/login.css">
    <title>LOGIN</title>
</head>
<body>

    <div class="container">
        <div class="top-container">
        <div id="calendar" class="calendar"></div>
        <i class="fa-solid fa-shield-halved"></i>
        </div>
        <div class="bottom-container">
            <div class="authentication"> 
                <h3>User Authentication</h3>
            </div>
            <div class="credentials">
            <form autocomplete="off" action="" method="post" id="loginForm">
                <div class="form-group">
                    <span class="icon"><i class="fa-solid fa-user-check"></i></span>
                    <input type="text" class="user" placeholder="Username" name="username" id="username" value="" >
                </div>
                <div class="form-group">
                    <span class="icon"><i class="fa-solid fa-lock"></i></span>
                    <input type="password" class="password" placeholder="password" name="password" id="password" value="" >
                </div>
                <div class="checkbox">
                    <input type="checkbox" name="remember_me">
                    <p for="">Remember Me</p>
                </div>
                <button type="submit" class="login">Login</button>
            </form>
            </div>
            <div class="footer"> 
                <a href="attendance.php">[Go to Attendance]</a>
            </div>
        </div>
    </div>

    <!-- Admin Login function -->
	<?php 

        // login
		include "js/login.js";
	
			if(isset($_COOKIE['id'])){

				$id = $con->real_escape_string($_COOKIE['id']);
				$sql = "SELECT * FROM `login-admin` WHERE id = ?";
				$stmt = $con->prepare($sql);
				$stmt->bind_param("i", $id);
				$stmt->execute();
				$result = $stmt->get_result();

				$row = $result->fetch_assoc();

				$username = $row['username'];
				$password_verify = "Admin";

				if(password_verify($password_verify, $row['password'])){
					$password = $password_verify;
				}
				// $username = $_COOKIE['username'];
				// $password = $_COOKIE['password'];
				echo " <script> document.getElementById('username').value = '$username' </script> ";
				echo " <script> document.getElementById('password').value = '$password' </script> ";	
			}
	?>
</body>
</html>