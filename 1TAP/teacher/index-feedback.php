<?php
    include "connect.php";

    if(isset($_POST['getFeedback'])){
        $rating = $_POST['rateVal'];
        $feedbackSMS = $_POST['feedbackSMS'];

        $sql = "INSERT INTO `feedback`(`ratings`, `sms`, `IS_EXIST`) VALUES ('$rating','$feedbackSMS','1')";
        $result = $con->query($sql);

        if($result == true){
            $message = "Successfuly Send";
            $response = array('status' => true, 'message' => $message);
        }
        else{
            $message = "Error";
            $response = array('status' => false, 'message' => $message);
        }
        echo json_encode($response);exit();
    }
?>