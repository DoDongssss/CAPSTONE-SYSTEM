<?php 
    include "connect.php";

    if(isset($_GET['delete_id'])){
        $student_id = $_GET['delete_id'];

        $sql = "UPDATE `student-information` SET `IS_EXIST` = 0 WHERE `id` = '$student_id' ";
        $delete_student = $con->query($sql);

        if ($delete_student) {
            $delete_student = array('status' => true, 'message' => 'Record deleted successfully.');
        }else{
            $delete_student = array('status' => true, 'message' => $conn->error);
        }
    
        echo json_encode($delete_student);exit();
    }

    if (isset($_GET['edit_id'])) {
        $student_id = $_GET['edit_id'];
    
        // write SQL to get user data
        $sql = "SELECT * FROM `student-information` WHERE `id`='$student_id'";
    
        //Execute the sql
        $edit_student = $con->query($sql);
    
        if ($edit_student->num_rows > 0) {
            $row = $edit_student->fetch_assoc();
            $edit_student = array('status' => true, 'data' => $row);
        }else{
            $edit_student = array('status' => false, 'data' => $con->error);
        }
        echo json_encode($edit_student);exit();
    } 
    

    // ADD STUDENT, RETURN AJAX IN MANAGE STUDENT
    if(isset($_POST['rfidid'])){
        $id         = $_POST['process-id'];  
        $RFID       = $_POST['rfidid'];
        $LRN        = $_POST['lrn'];
        $lastname   = $_POST['lastname'];
        $firstname  = $_POST['firstname'];
        $MI         = $_POST['mi'];
        $birthdate  = $_POST['birthdate'];
        $gender     = $_POST['gender'];
        $address    = $_POST['address'];
        $grade      = $_POST['grade'];
        $section    = $_POST['section'];
        $parent     = $_POST['gurdian'];
        $parentno   = $_POST['mobile'];
        $IS_EXIST   = 1;
        $profile    = $_POST['profile'];

        if($id == ''){
            $sql = "SELECT `RFID` FROM `student-information` WHERE RFID = '$RFID'";
            $result = $con->query($sql);
            $row = $result->fetch_assoc();

            if(!$row){
                $sql = "INSERT INTO `student-information` (`profile`, `RFID`,`LRN`,`lastname`,`firstname`,`MI`,`birthdate`,`gender`,`address`,`grade`,`section`,`parent`,`parentno`, `IS_EXIST`) VALUES ('$profile','$RFID', '$LRN', '$lastname', '$firstname', '$MI', '$birthdate', '$gender', '$address', '$grade', '$section', '$parent', '$parentno', '$IS_EXIST')";

                $message = "Record added successfully.";
                $addstudent_result = $con->query($sql);

                if ($student_result) {
                    move_uploaded_file($_FILES['student-profile']['tmp_name'],'studentprofile/' . $_FILES['student-profile']['name']);
                    $addstudent_result = array('status' => true, 'message' => $message);
                }else{
                    $addstudent_result = array('status' => false, 'message' => $conn->error);
                }
            }
            else{
                $message = "RFID already exist";
                $addstudent_result = array('status' => false, 'message' => $message);
            }
            echo json_encode($addstudent_result);exit();
        }
        else{
            $sql = "UPDATE `student-information` SET `profile`='$profile',`RFID`='$RFID',`LRN`='$LRN',`lastname`='$lastname',`firstname`='$firstname',`MI`='$MI',`birthdate`='$birthdate',`gender`='$gender',`address`='$address',`grade`='$grade',`section`='$section',`parent`='$parent',`parentno`='$parentno',`IS_EXIST`='$IS_EXIST' WHERE  id = '$id'";
            $message = "Record upated successfully.";
            $addstudent_result = $con->query($sql);

            $updateAttendanceInfo = "UPDATE `attendance` SET `grade`='$grade',`section`='$section' WHERE IS_EXIST = 1 AND `rfid` = '$RFID'";
            $updateAttendanceInfoResult = $con->query($updateAttendanceInfo);

                if ($addstudent_result) {
                    move_uploaded_file($_FILES['student-profile']['tmp_name'],'studentprofile/' . $_FILES['student-profile']['name']);
                    $addstudent_result = array('status' => true, 'message' => $message);
                }else{
                    $addstudent_result = array('status' => false, 'message' => $conn->error);
                }
                echo json_encode($addstudent_result);exit();
        }
    }
?>