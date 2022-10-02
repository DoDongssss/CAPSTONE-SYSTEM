
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login</title>
</head>
    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <!-- TOASTR NOTIFICATION -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    <!-- Font-awesome cndjs -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css">
    <!-- MAIN CSS -->
    <link rel="stylesheet" href="css/login.css">
<body>
    <div class="wrapper">
        <div class="container">
            <div class="card-top">
                <i class="fa-solid fa-school-flag"></i>
            </div>
            <div class="card-bottom">
                <div class="bottom-wrapper">
                    <div class="user-authentication">
                        <span><i class="fa-solid fa-circle"></i>Sign in</span>
                    </div>
                    <div class="credential-wrapper">
                        <form action="" method="POST" id="login-form">
                            <div class="input-group">
                                <i class="fa-solid fa-user-tie" id="user-icon"></i>
                                <input type="text" placeholder="Username" id="user" required>
                            </div>
                            <div class="input-group">
                                <i class="fa-solid fa-lock" id="pass-icon"></i>
                                <input type="password" placeholder="Password" id="pass" required>
                            </div>
                            <button>LOGIN</button>
                            <span>Forget Password</span>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
<script src="js/login.js"></script>
</html>
<?php
?>