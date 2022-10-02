<?php
    include "connect.php";
    date_default_timezone_set('Asia/Manila');

    if(isset($_POST['action']) && isset($_POST['cardid'])){
        $attendanceId = $_POST['cardid'];
        $sql = "SELECT * FROM `student-information` WHERE IS_EXIST = 1 AND `rfid` = '$attendanceId'";
        $resultStudentInfo = $con->query($sql);
        $studentInfo = $resultStudentInfo->fetch_assoc();
        $fullname = $studentInfo['lastname']." ".$studentInfo['firstname']." ".$studentInfo['MI'];
        $lrn = $studentInfo['LRN'];
        $grade = $studentInfo['grade'];
        $section = $studentInfo['section'];

        $time = date("H:i:s");
        // $time = "11:32";
        $date = date("Y/m/d");
        $sql = "SELECT * FROM `attendance` WHERE `IS_EXIST` = 1 AND `date` = '$date' AND `rfid` = '$attendanceId'";
        $result = $con->query($sql);
        $row = $result->fetch_assoc();

        $isTimeIn = ischeckTimeIn($row,$time);
        
        echo $result->num_rows;
        echo "tap";
        // timein
        if($isTimeIn){
            echo "hello1";
            // create row on time in
            if($result->num_rows < 1){
                $sql = "INSERT INTO `attendance`(`rfid`, `lrn`, `fullname`, `grade`, `section`, `date`, `IS_EXIST`) VALUES ('$attendanceId','$lrn','$fullname', '$grade', '$section', '$date','1')"  ;
                $result = $con->query($sql);
                echo "hello2";
            }    
            // timein in morning
            if(strtotime($time) < strtotime("11:30") && !$row){
                $sql = "UPDATE `attendance` SET `timein-am` = '$time' WHERE `date` = '$date' AND `rfid` = '$attendanceId'";
                $result = $con->query($sql);
                echo "hello3";   
            }
            // timeout in pm
            elseif(strtotime($time) >= strtotime("11:30")){
                $sql = "UPDATE `attendance` SET `timein-pm` = '$time' WHERE `date` = '$date' AND `rfid` = '$attendanceId'";
                $result = $con->query($sql);
                echo "hello4";   
            }
        }
        // timeout
        else{
            // timeout in morning
            if(strtotime($time) < strtotime("13:00") && !$row['timein-pm']){
                $sql = "UPDATE `attendance` SET `timeout-am` = '$time' WHERE `date` = '$date' AND `rfid` = '$attendanceId'";
                $result = $con->query($sql);
                echo "hello5";   
            }
            // timeout  in pm
            else{
                $sql = "UPDATE `attendance` SET `timeout-pm` = '$time' WHERE `date` = '$date' AND `rfid` = '$attendanceId'";
                $result = $con->query($sql);
                echo "hello6";   
            }
        }
        
        
    }

    function ischeckTimeIn($row,$time){
        // $time = date("H:i:s");

        if(!$row){
            return true;
        }

        if(!$row['timein-am'] && strtotime($time) < strtotime("11:30")){
            echo "check1";
            return true;
        }
        elseif($row['timein-am'] && !$row['timeout-am'] && strtotime($time) < strtotime("13:00")){
            echo "check2";
            return false;
        }

        if(!$row['timein-pm'] && strtotime($time) > strtotime("11:30")){
            echo "check3";
            return true;
        }

        return false;
    }


    // $time = date("H:i:s");

    // // echo $time;
    // echo strtotime($time) < strtotime("16:30");
    // //     echo "       ";
    // // echo strtotime("4:12");
?>