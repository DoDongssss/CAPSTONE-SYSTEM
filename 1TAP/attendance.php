<?php 
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
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">

    <link rel="stylesheet" href="css/attendance.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <title>Document</title>
</head>
<body>
    <div class="container">
        <div class="top-container">
            <div class="school-logo"><img src="img/school-logo.png" alt="" srcset=""></div>
            <div class="school">
                <h1 class="name">Tampakan National High School</h3>
                <p class="address">Poblacion Tampakan South Cotabato</p>
            </div>
            <div class="deped-logo">
                <img src="img/deped-logo.png" alt="" srcset="">
                <img src="img/deped-logo1.png" alt="" srcset="">
            </div>
        </div>

        <div class="msg-container">
            <div class="msg">
                <marquee loop="infinite" direction="" id="announcement">
                    <p>WELCOME BACK TO SCHOOL ---OBSERVED SOCIAL DISTANCING---</p>
                </marquee>
            </div>
        </div>

        <div class="id-container">
            <div class="student-id">
                <img src="studentprofile/studentprofile.png" alt="" srcset="" id="student-profile">
            </div>
            <!-- display none  text area -->
            <!-- <textarea type="text" name="rfidid" id="rfidid"style="display:none;" readonly></textarea> -->
            <div class="student-info">
                <div class="info-group">
                    <span>LRN</span>
                    <input type="text" id="lrn" placeholder="LRN">
                </div>
                <div class="info-group">
                    <span>NAME</span>
                    <input type="text" id="name" placeholder="NAME">
                </div>
                <div class="info-group">
                    <span>GRADE</span>
                    <input type="text" id="grade" placeholder="GRADE">
                </div>
                <div class="info-group">
                    <span>SECTION</span>
                    <input type="text" id="section" placeholder="SECTION">
                </div>
                <div class="info-group">
                    <span>TIME</span>
                    <input type="text" id="time" placeholder="TIME">
                </div>
                <div class="info-group">
                    <span>DATE</span>
                    <input type="text" id="date" placeholder="DATE">
                </div>
            </div>
        </div>

        <div class="bottom-container">
            <div id="calendar"></div>
        </div>
    </div>
    <script src="js/attendance.js"></script>
    <script src="js/calendar.js"></script>
</body>
</html>