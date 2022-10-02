<?php
    session_start();
    if($_SESSION['status'] == true){

    include "connect.php";

    $Write="<?php $" . "cardid=''; " . "echo $" . "cardid;" . " ?>";
	file_put_contents('cardidcontainer.php',$Write);
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

    <link rel="stylesheet" href="css/manage-student.css">
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
                            <a href="manage-student.php" id="active"><i class="fa-solid fa-users"></i><span>Manage Student</span></a>
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
                            Manage Student
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
                <div class="manage-student-content">
                        <form action="" method="post" id="display_student_form">
                        <div class="search-filter">
                            <select id="grade" onchange="get_grade()">
                                <option value="ALL">--select grade--</option>
                                <?php 
                                        $sql = "SELECT * FROM `grade` WHERE IS_EXIST = 1";
                                        $result = $con->query($sql);
                                        while($row =  $result->fetch_assoc()){
                                    ?>
                                    <option class="option" value="<?php echo $row['grade']?>"><?php echo $row['grade'] ?></option>
                                    <?php
                                        }
                                    ?>
                            </select>
                            <select id="section" onchange="get_section()">
                                <option value="ALL">--select section--</option>
                                <?php
                                        $sql = "SELECT * FROM `grade-section` WHERE IS_EXIST = 1";
                                        $result = $con->query($sql);
                                        while($row = $result->fetch_assoc()){
                                    ?>
                                        <option class="option" value="<?php echo $row['section']?>"><?php echo $row['section'] ?></option>
                                    <?php
                                        }
                                    ?>
                            </select>
                            <span></span>
                            <div class="input">
                                <i class="fa-brands fa-searchengin"></i>
                                <input type="text" id="search" placeholder=" Search Student LRN" onkeyup="get_search()">
                            </div>
                            <span></span>
                            <!-- <i class="fa-solid fa-folder-plus"></i>
                            <i class="fa-solid fa-file-excel"></i>
                            <i class="fa-solid fa-print"></i> -->
                            <button type="button" class="add" id="add-student-btn"><i class="fa-solid fa-folder-plus"></i>ADD STUDENT</button>
                            <button class="excel"><i class="fa-solid fa-file-excel"></i>EXPORT EXCEL</button>
                            <button class="print" onclick="window.print();"><i class="fa-solid fa-print"></i>PRINT</button>
                        </div>

                        <div class="student-content">
                            <div class="table-wrapper" id="scrollbar">
                            <table class="content-table" style="width:100%">  
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>RFID</th>
                                        <th>LRN</th>
                                        <th>LAST NAME</th>
                                        <th>FIRST NAME</th>
                                        <th>MI</th>
                                        <th>GRADE</th>
                                        <th>SECTION</th>
                                        <th>PARENTS/GUARDIAN</th>
                                        <th>MOBILE NO</th>
                                        <th>ADDRESS</th>
                                        <th>TOOLS</th></th>
                                        <!-- <th> </th> -->
                                    </tr>
                                </thead>
                                <tbody id="student-data">

                                </tbody>
                            </table>
                            </div>
                        </form>

                        <!-- MODAL -->
                        <div id="student-modal" class="modal">
                            <div class="modal-content">
                                <div class="modal-header">
                                </div>
                                <div class="content-section">
                                    <div class="header-section">
                                        <span id="modalClose" class="close no-select">&times;</span>
                                        <p>STUDENT ENTRY</p>
                                    </div>
                                    <form action="" type="POST" id="student-form" enctype="multipart/form-data" onsubmit="return false;">
                                        <div class="top-section">
                                            <div class="topleft-section">
                                                <div class="field-half clearfix">
                                                <div class="input-field-half">
                                                    <span><i class="fa-solid fa-address-card"></i></span>
                                                    <input type="text" class="rfid red" name="rfidid" id="rfidcardid"  placeholder="Scan RFID card">
                                                    <input type="hidden" name="process-id" id="id">
                                                    <!-- display none  text area/ ALSO GET THE ID OF RFID -->
                                                    <textarea type="text" class="rfid" id="rfidcard"  placeholder="Scan RFID card" style="display:none;" readonly></textarea>
                                                </div>
                                                <div class="input-field-half">
                                                    <span><i class="fa-solid fa-id-card-clip"></i></span>
                                                    <input type="text" name="lrn" id="lrn" placeholder="LRN" required>
                                                </div>
                                                </div>
                                                <div class="field-half clearfix">
                                                <div class="input-field-half">
                                                    <span><i class="fa-solid fa-user"></i></span>
                                                    <input type="text" name="lastname" id="lastname" placeholder="Lastname" required>
                                                </div>
                                                <div class="input-field-half">
                                                    <span><i class="fa-solid fa-user"></i></span>
                                                    <input type="text" name="firstname" id="firstname" placeholder="Firstname" required>
                                                </div>
                                                </div>
                                                <div class="field-half clearfix">
                                                <div class="input-field-half">
                                                    <span><i class="fa-solid fa-user"></i></span>
                                                    <input type="text" name="mi" id="mi" placeholder="Middle Initial" required>
                                                </div>
                                                <div class="input-field-half">
                                                    <span><i class="fa-solid fa-cake-candles"></i></span>
                                                    <input type="date" name="birthdate" id="birthdate" placeholder="Birthday" required>
                                                </div>
                                                </div>
                                                <hr>
                                            </div>
                                            <div class="topright-section">
                                                <div class="img-wrapper">
                                                    <div class="img-src">
                                                        <img src="" alt="" id="display-img">
                                                    </div>
                                                    <div class="img-url">
                                                        <input type="file" style="display:none;" name="student-profile" id="student-profile" accept="image/gif, image/jpeg" class="browse-img">
                                                        <button type="button" id="img-browse">Add Image</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="bottom-section">
                                            <div class="bottomtop-section">
                                                <div class="select-wrapper">
                                                    <div class="select-filed">
                                                        <select name="gender" id="gender" placeholder="Gender" required>
                                                            <option value="" disabled selected>--select gender--</option>
                                                            <option value="Male">Male</option>
                                                            <option value="Female">Female</option>
                                                        </select>
                                                        <div class="select_arrow"></div>
                                                    </div>
                                                    <div class="select-filed">
                                                        <select name="grade" id="add_grade" placeholder="Grade" onchange="add_grades()" required>
                                                            <option value="" disabled selected>--select grade--</option>
                                                            <?php 
                                                                $sql = "SELECT * FROM `grade` WHERE IS_EXIST = 1";
                                                                $result = $con->query($sql);
                                                                while($row =  $result->fetch_assoc()){
                                                            ?>
                                                                <option class="option" value="<?php echo $row['grade']?>"><?php echo $row['grade'] ?></option>
                                                            <?php
                                                                }
                                                            ?>
                                                        </select>
                                                        <div class="select_arrow"></div>
                                                    </div>
                                                    <div class="select-filed">
                                                        <select name="section" id="add_section" placeholder="Section" onchange="add_sections()" required>
                                                            <option value="" disabled selected>Select your Section</option>
                                                            <?php 
                                                                $sql = "SELECT `section` FROM `grade-section` WHERE IS_EXIST = 1";
                                                                $result = $con->query($sql);
                                                                while($row =  $result->fetch_assoc()){
                                                            ?>
                                                                <option class="option" value="<?php echo $row['section']?>"><?php echo $row['section'] ?></option>
                                                            <?php
                                                                }
                                                            ?>
                                                        </select>
                                                        <div class="select_arrow"></div>
                                                    </div>
                                                </div>
                                                <div class="field-half clearfix">
                                                <div class="input-field-half">
                                                    <span><i class="fa-solid fa-people-roof"></i></span>
                                                    <input type="text" name="gurdian" id="gurdian" placeholder="Guardian/Parent" required>
                                                </div>
                                                <div class="input-field-half">
                                                    <span><i class="fa-solid fa-square-phone"></i></span>
                                                    <input type="text" name="mobile" id="mobile" placeholder="Mobile No" required>
                                                </div>
                                                </div>
                                                <div class="input-field-half">
                                                    <span><i class="fa-solid fa-id-card-clip"></i></span>
                                                    <input type="text" name="address" id="address" placeholder="Address" required>
                                                </div>
                                                <hr>
                                            </div>
                                            <div class="bottombottom-section">
                                                <button type="submit">SAVE</button></button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            </div>
        </div>
         
        <script src="js/manage-student.js"></script>
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