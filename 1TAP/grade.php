<?php 
    include "connect.php";

    if(isset($_GET['grade'])){
        $sql = "SELECT * FROM `grade` WHERE IS_EXIST = 1";
        $result = $con->query($sql);
?>
        <option value="">--select grade--</option>
<?php
        while($row = $result->fetch_assoc()){
?>
            <option value="<?php echo $row['grade']?>"><?php echo $row['grade'] ?></option>
<?php
        }
    }
    // ADD GRADE LEVEL AND SECTION
    if(isset($_POST['hasGrade']) && isset($_POST['hasSection'])){
        $grade = $_POST['hasGrade'];
        $section = $_POST['hasSection'];

        $sql = "SELECT * FROM `grade-section` WHERE `section` = '$section' AND grade = '$grade'";
        $result = $con->query($sql);
        $row = $result->fetch_assoc();
        
        if(!$row){
            $sql = "INSERT INTO `grade-section`(`grade`, `section`, `IS_EXIST`) VALUES ('$grade','$section','1')";
            $gradelevel_result = $con->query($sql);
            $message = "Successfuly Added";
            if ($gradelevel_result) {
                $add_gradelevel = array('status' => true, 'message' => $message);
            }else{
                $add_gradelevel = array('status' => false, 'message' => $message);
            }
        }
        else{
            $message = "Already exist";
            $add_gradelevel = array('status' => false, 'message' => $message);
        }
        echo json_encode($add_gradelevel);exit();
    }
    // ADD GRADE LEVEL IN MODAL
    if(isset($_GET['hasGrade_modal'])){
        $gradelevel = $_GET['hasGrade_modal'];
        
        $sql = "SELECT * FROM `grade` WHERE grade = '$gradelevel'";
        $result = $con->query($sql);
        $row = $result->fetch_assoc();

        if(!$row){
            $sql = "INSERT INTO `grade`(`grade`, `IS_EXIST`) VALUES ('$gradelevel','1')";
            $result = $con->query($sql);
            $message = "Successfuly Added";
            if ($result) {
                $gradelevel_result = array('status' => true, 'message' => $message);
            }else{
                $gradelevel_result = array('status' => false, 'message' => $message);
            }
        }
        else{
            $message = "GradeLevel already exist";
            $gradelevel_result = array('status' => false, 'message' => $message);
        }
        echo json_encode($gradelevel_result);exit();
    }


    // DISPLAY THE GRADE LEVEL AND SECTION IN TABLE MANAGE SECTION
    if(isset($_GET['grade_modal_table'])){
        $sql = "SELECT * FROM `grade` WHERE IS_EXIST = 1";
        $result = $con->query($sql);
        while($row = $result->fetch_assoc()){
            ?>
                        <tr>
                            <td><?php echo $row['id']; ?></td>
                            <td><?php echo $row['grade']; ?></td>
                            <td><button type="button" style="color:red; border:none; cursor:pointer; background-color: inherit;" onclick="delete_gradelevel_modal(<?php echo $row['id']; ?>)" ><i class="fa-solid fa-trash-can"></i></button>
                            &nbsp;<button type="button" style="color:orange; border:none; cursor:pointer; background-color: inherit;" onclick="update_gradelevel_modal(<?php echo $row['id']; ?>)" ><i class="fa-solid fa-pen-to-square"></i></button></td>
                        </tr>
            <?php
                    }
    }

    
?>