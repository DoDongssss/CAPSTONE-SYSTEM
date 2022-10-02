<?php
    include "connect.php";

    if(isset($_GET['getall_grade'])){
        $sql = "SELECT * FROM `grade-section` WHERE IS_EXIST = 1 ORDER BY `id` DESC";
        $result = $con->query($sql);

        while($row = $result->fetch_assoc()){
?>
            <tr>
                <td><?php echo $row['id']; ?></td>
                <td><?php echo $row['grade']; ?></td>
                <td><?php echo $row['section']; ?></td>
                <td><?php echo $row['total']; ?></td>
                <td><button type="button" style="color:red; border:none; cursor:pointer; background-color: inherit;" onclick="delete_gradelevel(<?php echo $row['id']; ?>)" ><i class="fa-solid fa-trash-can"></i></button>
                &nbsp;<button type="button" style="color:orange; border:none; cursor:pointer; background-color: inherit;" onclick="update_gradelevel(<?php echo $row['id']; ?>)" ><i class="fa-solid fa-pen-to-square"></i></button></td>
            </tr>
<?php
        }
    }

    if(isset($_GET['specificGrade'])){
        $grade = $_GET['specificGrade'];
        $sql = "SELECT * FROM `grade-section` WHERE grade = '$grade' AND IS_EXIST = 1 ORDER BY `id` DESC";
        $result = $con->query($sql);

        while($row = $result->fetch_assoc()){
?>
            <tr>
                <td><?php echo $row['id']; ?></td>
                <td><?php echo $row['grade']; ?></td>
                <td><?php echo $row['section']; ?></td>
                <td><?php echo $row['total']; ?></td>
                <td><button type="button" style="color:red; border:none; cursor:pointer; background-color: inherit;" onclick="delete_gradelevel(<?php echo $row['id']; ?>)" ><i class="fa-solid fa-trash-can"></i></button>
                &nbsp;<button type="button" style="color:orange; border:none; cursor:pointer; background-color: inherit;" onclick="update_gradelevel(<?php echo $row['id']; ?>)" ><i class="fa-solid fa-pen-to-square"></i></button></td>
            </tr>
<?php
        }
    }
    // DELETE GRADE LEVEL AND SECTION
    if(isset($_GET['delete_id'])){
        $id = $_GET['delete_id'];

        $sql = "UPDATE `grade-section` SET `IS_EXIST`='0' WHERE id = '$id'";
        $result = $con->query($sql);

        $message = "Successfuly Deleted";
        if ($result) {
            $delete_gradelevel = array('status' => true, 'message' => $message);
        }else{
            $delete_gradelevel = array('status' => false, 'message' => $con->error);
        }
        echo json_encode($delete_gradelevel);exit();
    }

    // DELETE GRADELEVEL IN MODAL
    if(isset($_GET['delete_modal_id'])){
        $id = $_GET['delete_modal_id'];

        $sql = "UPDATE `grade` SET `IS_EXIST`='0' WHERE id = '$id'";
        $result = $con->query($sql);

        $message = "Successfuly Deleted";
        if ($result) {
            $delete_gradelevel_modal_result = array('status' => true, 'message' => $message);
        }else{
            $delete_gradelevel_modal_result = array('status' => false, 'message' => $con->error);
        }
        echo json_encode($delete_gradelevel_modal_result);exit();
    }

    // UPDATE GRADELEVEL IN MODAL
    if(isset($_GET['update_modal_id'])){
        $grade_id = $_GET['update_modal_id'];
    
        // write SQL to get user data
        $sql = "SELECT * FROM `grade` WHERE `id`='$grade_id'";
    
        //Execute the sql
        $edit_grade = $con->query($sql);
    
        if ($edit_grade->num_rows > 0) {
            $row = $edit_grade->fetch_assoc();
            $edit_grade_result = array('status' => true, 'data' => $row);
        }else{
            $edit_grade_result = array('status' => false, 'data' => $con->error);
        }
        echo json_encode($edit_grade_result);exit();
    }

    // UPDATE THE GRADELEVEL IN THE DATABASE MODAL
    if(isset($_GET['updateGrade']) && $_GET['grade_id']){
        $updateGrade = $_GET['updateGrade'];
        $grade_id = $_GET['grade_id'];

        $sql = "SELECT * FROM `grade` WHERE grade = '$updateGrade'";
        $result = $con->query($sql);
        $row = $result->fetch_assoc(); 

        if(!$row){
            $sql = "UPDATE `grade` SET `grade`='$updateGrade' WHERE id = '$grade_id'";
            $result = $con->query($sql);
            $message = "Successfuly updated";
            $update_gradelevel_result = array('status' => true, 'message' => $message);
        }
        else{
            $message = "Grade Level exist!";
            $update_gradelevel_result = array('status' => false, 'message' => $message);
        }
        echo json_encode($update_gradelevel_result);exit();

    }

?>