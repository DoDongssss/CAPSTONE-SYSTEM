<?php
    include "connect.php";
    session_start();
    date_default_timezone_set('Asia/Manila');
    $time = date("H:i:s");

    $user = $_SESSION['user'];

    if(isset($_POST['flagstatus'])){
        $sql = "UPDATE `login-teacher` SET  `flagstatus` = '$time' WHERE `username` = '$user' AND IS_EXIST = 1";
        $result = $con->query($sql);
    }
?>