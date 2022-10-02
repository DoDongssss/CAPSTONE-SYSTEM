<?php
    session_start();
    if($_SESSION['status'] == true){
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <!-- TOASTR NOTIFICATION -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">

    <!-- Font-awesome cndjs -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css">

    <link rel="stylesheet" href="css/announcement.css">
    <link rel="stylesheet" href="css/index.css">
    <link rel="stylesheet" href="css/root.css">
    <title>Document</title>
</head>
<body>
        <div class="container-wrapper">
            <div class="sidebar" id="sidebar-toggle">
                <div class="sidebar-header">
                        <h3><i class="fa-regular fa-credit-card"></i><span>Smart Card</span></h3>
                </div>
                <hr></hr>
                <div class="sidebar-content">
                    <ul>
                        <li>
                            <a href="dashboard.php"><i class="fa-solid fa-qrcode"></i><span>Dashboard</span></a>
                        </li>
                        <li>
                            <a href="manage-student.php"><i class="fa-solid fa-users"></i><span>Manage Student</span></a>
                        </li>
                        <li>
                            <a href="manage-teacher.php"><i class="fa-solid fa-chalkboard-user"></i><span>Manage Teacher</span></a>
                        </li>
                        <li>
                            <a href="manage-section.php"><i class="fa-solid fa-folder"></i><span>Manage Section</span></a>
                        </li>
                        <li>
                            <a href="smsblaster.php"><i class="fa-solid fa-envelope"></i><span>SMS Blaster</span></a>
                        </li>
                        <li>
                            <a href="records.php"><i class="fa-solid fa-coins"></i><span>Records</span></a>
                        </li>
                        <li>
                            <a href="announcement.php" id="active"><i class="fa-solid fa-bullhorn"></i><span>Announcement</span></a>
                        </li>
                        <li>
                            <a href="setting.php"><i class="fa-solid fa-user-gear"></i><span>Settings</span></a>
                        </li>
                        <!-- <li class="footer" id="calendar"></li> -->
                    </ul>
                </div>

            </div>
            <div class="content" id="content-toggle">
                <div class="content-header">
                    <div class="left-header">
                        <p>
                            <i class="fa-solid fa-bars-staggered" id="nav-toggle"></i>
                            <a href="index.php">
                            <i class="fa-solid fa-house"></i>
                            </a>
                            <i class="fa-solid fa-angle-right"></i>
                            Announcement
                        </p>
                    </div>
                    <div class="right-header">
                        <div class="notification">
                            <i class="fa-solid fa-envelope"></i>
                            <i class="fa-solid fa-bell"></i>
                            <div class="user">
                                <i class="fa-solid fa-circle-user" id="user"></i>
                                <span>Super Admin</span>
                                <ul id="dropdown-user">
                                    <li class="admin">SUPER ADMIN</li>
                                    <li class="option">
                                        <a href="">
                                            <i class="fa-solid fa-user-shield"></i>
                                            Profile
                                        </a>
                                        <a href="logout-function.php">
                                            <i class="fa-solid fa-power-off"></i>
                                            Logout
                                        </a>
                                    </li>
                                </ul>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="content-body">
                    <div class="announcement-content">
                    <form action="" method="GET" id="announcement_form">
                        <div class="input-filter">
                            <div class="input-filter-group">
                                <input type="text" name="" id="announce_content" placeholder="Announcement" required> </input>
                                <input type="text" style="display:none;" id="update_id"> </input>
                                <i class="fa-solid fa-bullhorn"></i>
                            </div>
                            <input type="checkbox" id="status" value="1"> <span>Posted</span>
                            <div class="btn-filter-group">
                                <button type="submit" id="saveBTN">SAVE</button>
                                <button type="button" id="updateBTN">UPDATE</button>
                            </div>
                        </div>
                        <div class="announcement-table">
                            
                                <table class="content-table" id="scrollbar">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Announcement</th>
                                            <th>Status</th>
                                            <th>Tools</th>
                                        </tr>
                                    </thead>
                                    <tbody id="announcement_table">

                                    </tbody>
                                </table>
                    </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <script src="js/announcement.js"></script>
        <script src="js/navigation.js"></script>
        <script src="js/calendar.js"></script>
<?php
    }else{
        header('location:login.php');
         session_destroy();
    }
?>
</body>
</html>