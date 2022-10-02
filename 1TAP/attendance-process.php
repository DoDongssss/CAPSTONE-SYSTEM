<?php 
    include "connect.php";
    
    // echo "success";

    if(isset($_POST['cardid'])){
        $attendanceid = $_POST['cardid'];
    }

    if($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['action'])){
    $action = $_POST['action'];
        switch ($action) {
            case 'default':
                defaultdata();
            break;
            case 'showProcess':
                studentAttendance();
                setAttendance();
            default:
            break;
        }
    }

    function studentAttendance(){

    }

    function defaultdata(){

    }
    function setAttendance(){

    }

    if(isset($_GET['getannouncement'])){
        $sql = "SELECT `announcement` FROM `announcement` WHERE `IS_EXIST` = 1 AND `status` = 1";
        $result = $con->query($sql);

        while($row = $result->fetch_assoc()){
            $announcementList[] = $row['announcement'];
        }
?>
        <p>
<?php
        for($i = 0; count($announcementList) > $i; $i++){
            echo $announcementList[$i],str_repeat("&nbsp;", 30);
        }
?>
        </p>
<?php

    }

?>