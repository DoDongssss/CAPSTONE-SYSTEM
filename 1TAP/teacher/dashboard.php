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
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<!-- TOASTR NOTIFICATION -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
<!-- Font-awesome cndjs -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css">
<!-- MAIN CSS -->
<link rel="stylesheet" href="css/index.css">
<link rel="stylesheet" href="css/dashboard.css">
<link rel="stylesheet" href="css/calendar.css">
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
                                    <li><i class="fa-solid fa-face-sad-tear"></i></li>
                                    <li><i class="fa-solid fa-face-frown-open"></i></li>
                                    <li><i class="fa-solid fa-face-smile"></i></li>
                                    <li><i class="fa-solid fa-face-smile-beam"></i></li>
                                    <li><i class="fa-solid fa-face-laugh-squint"></i></li>
                                </ul>
                            </div>
                            <div class="feedback-sms">
                                <p>Do you have any thoughts you like to share?</p>
                                <textarea name="" id="feedbackSMS" maxlength="150"></textarea>
                                <p id="textLenght">0/150</p>
                            </div>
                            <div class="feedback-btn">
                                <button>Send</button>
                                <button>Cancel</button>
                            </div>
                        </div>
                    </div>
                    <div class="search-group">
                        <input type="text" placeholder="search">
                        <i class="fa-solid fa-magnifying-glass"></i>
                    </div>
                </div>
                </div>
            </div>
            <div class="content-body">
                <div class="dashboard">
                    <div class="nav">
                        <i class="fa-solid fa-house" id="index"></i>
                        <i class="fa-solid fa-angle-right"> <span>Dashboard</span></i>
                    </div>
                    <div class="cards">
                        <div class="card one">
                            <div class="left-card">
                                <h5>Student</h5>
                                <i class="fa-solid fa-user-graduate"></i>
                            </div>
                            <div class="right-card">
                                <span>500</span>
                                <p>Total Students</p>
                            </div>
                        </div>
                        <div class="card two">
                            <div class="left-card">
                                <h5>Subject</h5>
                                <i class="fa-solid fa-folder-open"></i>
                            </div>
                            <div class="right-card">
                                <span>500</span>
                                <p>Total Subjects</p>
                            </div>
                        </div>
                        <div class="card three">
                            <div class="left-card">
                                <h5>Present</h5>
                                <i class="fa-solid fa-user-plus"></i>
                            </div>
                            <div class="right-card">
                                <span>0</span>
                                <p>Total Presents</p>
                            </div>
                        </div>
                        <div class="card four">
                            <div class="left-card">
                                <h5>Absent</h5>
                                <i class="fa-solid fa-user-minus"></i>
                            </div>
                            <div class="right-card">
                                <span>0</span>
                                <p>Total Absents</p>
                            </div>
                        </div>
                    </div>
                    <div class="calendar">
                        <div class="calendar-content" id="cal-container">
                            <div id="header">
                                <div id="monthDisplay"></div>

                                <div>
                                    <button id="backButton"><i class="fa-solid fa-chevron-left"></i></button>
                                    <button id="nextButton"><i class="fa-solid fa-chevron-right"></i></button>
                                </div>
                            </div>
                            <div id="weekdays">
                                <div>Sunday</div>
                                <div>Monday</div>
                                <div>Tuesday</div>
                                <div>Wednesday</div>
                                <div>Thursday</div>
                                <div>Friday</div>
                                <div>Saturday</div> 
                            </div>
                            <div id="calendar"></div>
                            <div id="newEventModal">
                                <h2>New Event</h2>
                                <input type="text" id="eventTitleInput">

                                <button id = "saveButton" >Save</button>
                                <button id = "cancelButton">Cancel</button>
                            </div>
                            <div id="deleteEventModal">
                                <h2>Event</h2>
                                <p id="eventText"></p>

                                <button id="deleteButton">Delete</button>
                                <button id="closeButton">Close</button>
                            </div>
                            <div id="modalBackDrop"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
<script src="js/dashboard.js"></script>
<script src="js/index.js"></script>
<script src="js/userStatusChecker.js"></script>
<script src="js/calendar.js"></script>
</html>

<?php
    }else{
        header('location:login.php');
        $_SESSION['status-teacher'] = '';
    }
?>