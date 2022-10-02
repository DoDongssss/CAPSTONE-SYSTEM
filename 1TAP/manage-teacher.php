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
        
    <link rel="stylesheet" href="css/manage-teacher.css">
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
                            <a href="manage-teacher.php" id="active"><i class="fa-solid fa-chalkboard-user"></i><span>Manage Teacher</span></a>
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
                            <a href="announcement.php"><i class="fa-solid fa-bullhorn"></i><span>Announcement</span></a>
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
                            Manage Teacher
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
                <div class="teacher-content">
                    <form action="">
                        <div class="search-filter">
                            <select name="" id="">
                                <option value="">--Master / Major--</option>
                            </select>
                            <i class="fa-solid fa-pen-to-square" id="add-teacher"></i>
                            <span></span>
                            <div class="input">
                                <i class="fa-brands fa-searchengin"></i>
                                <input type="text" id="searchid" placeholder="search">
                            </div>
                            <!-- <span></span>
                            <button type="button" id="add-teacher">ADD TEACHER</button> -->
                        </div>
                        <div class="teacher-body" id="scrollbar">
                            <table class="content-table">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>ID</th>
                                        <th>EMAIL</th>
                                        <th>LASTNAME</th>
                                        <th>FIRSTNAME</th>
                                        <th>MOBILE</th>
                                        <th>TOOLS</th>
                                    </tr>
                                </thead>
                                <tbody id="teacher-table">

                                </tbody>
                            </table>
                        </div>
                    </form>

                    <div id="teacher-modal" class="modal">
                    <div class="modal-content">
                        <div class="modal-header">
                            <span id="modalClose" class="close no-select">&times;</span>
                        </div>
                        <form action="" method="post" id="form-teacher-modal">
                            <div class="modal-body">
                                <div class="title-container">
                                    <h2>TEACHER REGISTRATION</h2>
                                </div>
                                <div class="input-group">
                                    <span><i class="fa-solid fa-id-card"></i></span>
                                    <input type="text" name="updateid" value="001" style="display:none;">
                                    <input type="text" id="id" name="id" placeholder="ID" required>
                                </div>
                                <div class="input-group">
                                    <span><i class="fa-solid fa-envelope"></i></span>
                                    <input type="email" id="email" name="email" placeholder="Email" required>
                                </div>
                                <div class="input-group">
                                    <span><i class="fa-solid fa-lock"></i></span>
                                    <input type="password" id="password" name="password" placeholder="Password" min="8" max="16" required>
                                </div>
                                <div class="input-group">
                                    <span><i class="fa-solid fa-lock"></i></span>
                                    <input type="password" id="re-password" name="re-password" placeholder="Confirm Password" min="8" max="16" required>
                                </div>
                                <div class="input-group">
                                    <span><i class="fa-solid fa-mobile-screen"></i></span>
                                    <input type="text" id="mobile" name="mobile" placeholder="Contact Number" min="11" max="15" required>
                                </div>
                                <div class="input-group-half">
                                    <div class="half">
                                        <span><i class="fa-solid fa-user"></i></span>
                                        <input type="text" id="lastname" name="lastname" placeholder="Lastname" required>
                                    </div>
                                    <div class="space-between"></div>
                                    <div class="half">
                                        <span><i class="fa-solid fa-user"></i></span>
                                        <input type="text" id="firstname" name="firstname" placeholder="Firstname" required>
                                    </div>
                                </div>
                                <button type="submit">SAVE</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

        <script src="js/manage-teacher.js"></script>
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