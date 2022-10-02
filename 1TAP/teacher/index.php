<?php
    session_start();
    // session_destroy();
    
    if($_SESSION['status-teacher']){
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>index</title>
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
<link rel="stylesheet" href="css/index.css">
<body>
    <div id="pre-loader"></div>
    <div class="wrapper">
        <div class="container">
            <div class="header">
                <div class="header-content">
                <div class="img-container">
                    <img src="./img/school-logo.png" alt="">
                </div>
                <div class="user-profile">
                    <div class="user">
                        <span id="openUserOption">
                            <?php echo $_SESSION['user']; ?>
                            <i class="fa-solid fa-caret-down"></i>
                        </span>
                        <ul class="user-option" id="userOption">
                            <li>Profile</li>
                            <li>Settings</li>
                            <span></span>
                            <li id="logout">Logout</li>
                        </ul>
                    </div>
                    <div class="notification" id="notificationActive">
                        <i class="fa-solid fa-bell"></i>
                        <ul id="notifications">
                            <li>Asumbra Absent <i class="fa-solid fa-xmark"></i></li>
                            <li>Asumbra Absent <i class="fa-solid fa-xmark"></i></li>
                            <li>Asumbra Absent <i class="fa-solid fa-xmark"></i></li>
                            <li>Asumbra Absent <i class="fa-solid fa-xmark"></i></li>
                            <li>Asumbra Absent <i class="fa-solid fa-xmark"></i></li>
                            <li>Asumbra Absent <i class="fa-solid fa-xmark"></i></li>
                            <li>Asumbra Absent <i class="fa-solid fa-xmark"></i></li>
                            <li>Asumbra Absent <i class="fa-solid fa-xmark"></i></li>
                            <li>Asumbra Absent <i class="fa-solid fa-xmark"></i></li>
                            <li>Asumbra Absent <i class="fa-solid fa-xmark"></i></li>
                            <li>Asumbra Absent <i class="fa-solid fa-xmark"></i></li>
                            <li>Asumbra Absent <i class="fa-solid fa-xmark"></i></li>
                            <li>Asumbra Absent <i class="fa-solid fa-xmark"></i></li>
                            <li>Asumbra Absent <i class="fa-solid fa-xmark"></i></li>
                        </ul>
                    </div>
                    <div class="sms" id="smsActive">
                        <i class="fa-solid fa-envelope" id="smsBtnActive"></i>
                        <i class="fa-solid fa-envelope-open" id="smsBtnRemove"></i>
                        <div class="feedback" id="feedback">
                            <div class="feedback-title">
                                <h5>Give Feedback</h5>
                            </div>
                            <div class="ratings">
                                <p>What is your emotion about the system?</p>
                                <ul>
                                    <li id="oneRate"><i class="fa-solid fa-face-sad-tear"></i></li>
                                    <li id="twoRate"><i class="fa-solid fa-face-frown-open"></i></li>
                                    <li id="threeRate"><i class="fa-solid fa-face-smile"></i></li>
                                    <li id="fourRate"><i class="fa-solid fa-face-smile-beam"></i></li>
                                    <li id="fiveRate"><i class="fa-solid fa-face-laugh-squint"></i></li>
                                </ul>
                            </div>
                            <div class="feedback-sms">
                                <p>Do you have any thoughts you like to share?</p>
                                <textarea name="" id="feedbackSMS" maxlength="150"></textarea>
                                <p id="textLenght">0/150</p>
                            </div>
                            <div class="feedback-btn">
                                <button id="sendFeedbackBtn">Send</button>
                                <button id="cancelFeedbackBtn">Cancel</button>
                            </div>
                        </div>
                    </div>
                    <div class="search-group">
                        <input type="text" placeholder="search">
                        <i class="fa-solid fa-magnifying-glass"></i>
                    </div>
                </div>

                <div class="bubble">
                    <div class="greetings" id="greetings">
                        <h2>Good Morning Teacher Sabado &#128516;</h2>
                    </div>
                </div>
                </div>
            </div>
            <div class="content-body">
                <div class="body-wrapper">
                    <div class="icon-group" id="dashboard">
                        <div class="icon">
                            <i class="fa-brands fa-microsoft"></i>
                        </div>
                        <span>DASHBOARD</span>
                    </div>
                    <div class="icon-group">
                        <div class="icon">
                            <i class="fa-solid fa-qrcode"></i>
                        </div>
                        <span>SCAN</span>
                    </div>
                    <div class="icon-group">
                        <div class="icon">
                            <i class="fa-solid fa-folder-open"></i>
                        </div>
                        <span>SUBJECTS</span>
                    </div>
                    <div class="icon-group">
                        <div class="icon">
                            <i class="fa-solid fa-list-check"></i>
                        </div>
                        <span>STUDENTS</span>
                    </div>
                    <div class="icon-group">
                        <div class="icon">
                            <i class="fa-solid fa-table"></i>
                        </div>
                        <span>RECORDS</span>
                    </div>
                    <div class="icon-group">
                        <div class="icon">
                            <i class="fa-solid fa-screwdriver-wrench"></i>
                        </div>
                        <span>SETTING</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
<script src="js/index.js"></script>
<script src="js/userStatusChecker.js"></script>
</html>

<?php
    }else{
        header('location:login.php');
        $_SESSION['status-teacher'] = '';
    }
?>