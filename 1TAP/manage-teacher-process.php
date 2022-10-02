<?php
    include "connect.php";

    if(isset($_POST['id'])){
        $teacherid = $_POST['id'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $repassword = $_POST['re-password'];
        $mobile = $_POST['mobile'];
        $lastname = $_POST['lastname'];
        $firstname = $_POST['firstname'];

        if(isset($_POST['updateid']) == 001){
            $password = password_hash($password, PASSWORD_DEFAULT);
            $sqlLogin = "INSERT INTO `login-teacher` (`username`, `password`, `IS_EXIST`) 
                        VALUES ('$teacherid', '$password', 1)";
            $resultLogin = $con->query($sqlLogin);

            $sql = "INSERT INTO `teacher-information`(`teacherid`, `password`, `repassword`, `email`, `mobile`, `lastname`, `firstname`, `IS_EXIST`) VALUES ('$teacherid','$password','$password','$email','$mobile','$lastname','$firstname', '1')";
            $result = $con->query($sql);
            $message = "Successfully Added";
        }
        else{
            
            $updateid = $_POST['updateid'];
            $sql = "UPDATE `teacher-information` SET `teacherid`='$teacherid',`password`='$password',`repassword`='$password',`email`='$email',`mobile`='$mobile',`lastname`='$lastname',`firstname`='$firstname' WHERE id = '$updateid' AND IS_EXIST = 1";
            $sql = $con->query($sql);
            $message = "Successfully updated";
            
        }
        
        $addTeacher_result = array('status' => true, 'message' => $message);
        echo json_encode($addTeacher_result);exit();
    }

    if(isset($_GET['get-teacher'])){
        $sql = "SELECT * FROM `teacher-information` WHERE IS_EXIST = '1' ORDER BY `id` DESC";
        $result = $con->query($sql);

        while($row = $result->fetch_assoc()){
?>
            <tr>
                <td><?php echo $row['id']; ?></td>
                <td><?php echo $row['teacherid']; ?></td>
                <td><?php echo $row['email']; ?></td>
                <td><?php echo $row['lastname']; ?></td>
                <td><?php echo $row['firstname']; ?></td>
                <td><?php echo $row['mobile']; ?></td>
                <td><button type="button" style="color:red; border:none; cursor:pointer; background-color: inherit;" onclick="delete_teacher(<?php echo $row['id']; ?>)" ><i class="fa-solid fa-trash-can"></i></button>
                &nbsp;<button type="button" style="color:orange; border:none; cursor:pointer; background-color: inherit;" onclick="update_teacher(<?php echo $row['id']; ?>)" ><i class="fa-solid fa-pen-to-square"></i></button></td>
            </tr>
<?php
        }
        echo $response;
    }

    if(isset($_GET['delete-teacher'])){
        $id = $_GET['delete-teacher'];

        $sql = "UPDATE `teacher-information` SET `IS_EXIST`='0' WHERE id = '$id'";
        $result = $con->query($sql);

        $message = "Successfully Deleted";
        $delete_teacher_result = array('status' => true, 'message' => $message);
        echo json_encode($delete_teacher_result);exit();
    }

    if(isset($_GET['update_teacher'])){
        $id = $_GET['update_teacher'];

        $sql = "SELECT * FROM `teacher-information` WHERE id = '$id'";
        $result = $con->query($sql);

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $update_teacher_result = array('status' => true, 'data' => $row);
        }else{
            $update_teacher_result = array('status' => false, 'data' => $con->error);
        }
        echo json_encode($update_teacher_result);exit();
    }

    if(isset($_POST['search_teacher'])){
        $searchid = $_POST['search_teacher'];
        $sql = "SELECT * FROM `teacher-information` WHERE IS_EXIST = '1' AND  teacherid = '$searchid' ORDER BY `id` DESC";
        $result = $con->query($sql);

        while($row = $result->fetch_assoc()){
?>
            <tr>
                <td><?php echo $row['id']; ?></td>
                <td><?php echo $row['teacherid']; ?></td>
                <td><?php echo $row['email']; ?></td>
                <td><?php echo $row['lastname']; ?></td>
                <td><?php echo $row['firstname']; ?></td>
                <td><?php echo $row['mobile']; ?></td>
                <td><button type="button" style="color:red; border:none; cursor:pointer; background-color: inherit;" onclick="delete_teacher(<?php echo $row['id']; ?>)" ><i class="fa-solid fa-trash-can"></i></button>
                &nbsp;<button type="button" style="color:orange; border:none; cursor:pointer; background-color: inherit;" onclick="update_teacher(<?php echo $row['id']; ?>)" ><i class="fa-solid fa-pen-to-square"></i></button></td>
            </tr>
<?php
        }
        if($result->num_rows < 1){
?>
            <tr>
                <td></td>
                <td></td>
                <td></td>
                <td>NO DATA FOUND</td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
<?php
        }
         echo $response;
    }
?>