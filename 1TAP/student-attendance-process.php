<?php
    include "connect.php";
    date_default_timezone_set('Asia/Manila');
    $date = date("Y/m/d");

    $sql = "SELECT * FROM `attendance` WHERE `IS_EXIST` = '1' AND `date` = '$date' ORDER BY updatedAt desc";
    $result = $con->query($sql);
    $row = $result->fetch_assoc();

    if($result->num_rows > 0){
        $studentId = $row['rfid'];
        $studentTime = '';
        $studentDate = $row['date'];

        if($row['timein-am'] && !$row['timeout-am']){
            $studentTime = $row['timein-am']." "."AM  TIMEIN";
        }
        elseif($row['timeout-am'] && !$row['timein-pm']){
            $studentTime = $row['timeout-am']." "."AM  TIMEOUT";
        }
        elseif($row['timein-pm'] && !$row['timeout-pm']){
            $studentTime = $row['timein-pm']." "."PM  TIMEIN";
        }
        else{
            $studentTime = $row['timeout-pm']." "."PM  TIMEOUT";
        }


        $sql = "SELECT * FROM `student-information` WHERE IS_EXIST = 1 AND rfid = '$studentId'";
        $result = $con->query($sql);
        $studentInfo = $result->fetch_assoc();

        if($result->num_rows > 0){
            $attendanceResult = array('status' => true, 'studentInfo' => $studentInfo, 'studentTime' => $studentTime, 'studentDate' => $studentDate);
        }
        else{
            $attendanceResult = array('status' => false);
        }  
    }
    else{
        $attendanceResult = array('status' => false);
    }  


    echo json_encode($attendanceResult);exit();
    
    
    
?>