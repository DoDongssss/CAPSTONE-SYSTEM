<?php
    include "connect.php";

    if(isset($_GET['displaytable'])){
        $sql = "SELECT * FROM `announcement` WHERE IS_EXIST = 1";
        $result = $con->query($sql);

        while($row = $result->fetch_assoc()){
?>
            <tr>
                <td><?php echo $row['id']; ?></td>
                <td><?php echo $row['announcement']; ?></td>
                <td><?php echo $row['status']; ?></td>
                <td><button type="button" style="color:red; border:none; cursor:pointer; background-color: inherit;" onclick="delete_announcement(<?php echo $row['id']; ?>)" ><i class="fa-solid fa-trash-can"></i></button>
                &nbsp;<button type="button" style="color:orange; border:none; cursor:pointer; background-color: inherit;" onclick="update_announcement(<?php echo $row['id']; ?>)" ><i class="fa-solid fa-pen-to-square"></i></button></td>
            </tr>
<?php
        }
        echo $table_response;
    }

    if(isset($_GET['announcement'])){
        $announcement = $_GET['announcement'];
        
        if(isset($_GET['announcement_status'])){
            $sql = "INSERT INTO `announcement`(`announcement`, `status`, `IS_EXIST`) VALUES ('$announcement','1','1')";
        }
        else{
            $sql = "INSERT INTO `announcement`(`announcement`, `status`, `IS_EXIST`) VALUES ('$announcement','0','1')";
        }

        $result = $con->query($sql);

        $message = "Successfuly Added";
        $announcement_result = array('status' => true, 'message' => $message);
        echo json_encode($announcement_result);exit();
        
    }

    if(isset($_GET['delete_announcement'])){
        $delete_announcement_id = $_GET['delete_announcement'];    
        $sql = "UPDATE `announcement` SET `IS_EXIST`='0' WHERE id = $delete_announcement_id";
        $result = $con->query($sql);

        $message = "Successfuly deleted";
        $delete_result = array('status' => true, 'message' => $message);

        echo json_encode($delete_result);exit();
    }

    if(isset($_GET['update_announcement'])){
        $update_announcement_id = $_GET['update_announcement'];
        
        $sql = "SELECT * FROM `announcement` WHERE `id` = '$update_announcement_id' AND IS_EXIST = 1";
        $result = $con->query($sql);

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $update_result = array('status' => true, 'data' => $row);
        }else{
            $update_result = array('status' => false, 'data' => $con->error);
        }

        echo json_encode($update_result);exit();
    }

    if(isset($_GET['update_id'])){
        $update_id = $_GET['update_id'];
        $updated_announcement = $_GET['updated_announcement'];
        $updated_announcement_status = $_GET['updated_status'];

        $sql = "UPDATE `announcement` SET `announcement`='$updated_announcement',`status`='$updated_announcement_status' WHERE id = '$update_id' AND IS_EXIST = 1";
        $result = $con->query($sql);

        $message = "Updated Successfuly";
        $updated_result = array('status' => true, 'message' => $message);

        echo json_encode($updated_result);exit();
    }
?>