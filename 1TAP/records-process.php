<?php
    include "connect.php";

    if(isset($_GET['getRecords'])){
        $sql = "SELECT * FROM `attendance` WHERE IS_EXIST = 1 ORDER BY `date` DESC, `fullname` ASC";
        $result = $con->query($sql);

        while($row = $result->fetch_assoc()){
?>
        <tr>
            <td><?php echo $row['id'] ?></td>
            <td><?php echo $row['lrn'] ?></td>
            <td><?php echo $row['fullname'] ?></td>
            <td><?php echo $row['grade'] ?></td>
            <td><?php echo $row['section'] ?></td>
            <td><?php echo $row['timein-am'] ?></td>
            <td><?php echo $row['timeout-am'] ?></td>
            <td><?php echo $row['timein-pm'] ?></td>
            <td><?php echo $row['timeout-pm'] ?></td>
            <td><?php echo $row['date'] ?></td>
            <td><button type="button" style="color:red; border:none; cursor:pointer; background-color: inherit;" onclick="delete_attendance(<?php echo $row['id']; ?>)" ><i class="fa-solid fa-trash-can"></i></button>
                &nbsp;<button type="button" style="color:orange; border:none; cursor:pointer; background-color: inherit;" onclick="update_attendance(<?php echo $row['id']; ?>)" ><i class="fa-solid fa-pen-to-square"></i></button></td>
        </tr>
<?php
        }
    }

    if(isset($_GET['delete_id'])){
        $attendance_id = $_GET['delete_id'];

        $sql = "UPDATE `attendance` SET `IS_EXIST`='0' WHERE id = '$attendance_id'";
        $result = $con->query($sql);

        $message = "Successfully Deleted";
        $delete_attendance_result = array('status' => true, 'message' => $message);
        echo json_encode($delete_attendance_result);exit();
    }

    if(isset($_POST['dateOnly'])){
        $dateOne = $_POST['dateOne'];
        $dateTwo = $_POST['dateTwo'];
        
        $sql = "SELECT * FROM `attendance` WHERE IS_EXIST = 1 AND `date` BETWEEN '$dateOne' AND '$dateTwo'";
        $result = $con->query($sql);

        while($row = $result->fetch_assoc()){
?>
                    <tr>
                        <td><?php echo $row['id'] ?></td>
                        <td><?php echo $row['lrn'] ?></td>
                        <td><?php echo $row['fullname'] ?></td>
                        <td><?php echo $row['grade'] ?></td>
                        <td><?php echo $row['section'] ?></td>
                        <td><?php echo $row['timein-am'] ?></td>
                        <td><?php echo $row['timeout-am'] ?></td>
                        <td><?php echo $row['timein-pm'] ?></td>
                        <td><?php echo $row['timeout-pm'] ?></td>
                        <td><?php echo $row['date'] ?></td>
                        <td><button type="button" style="color:red; border:none; cursor:pointer; background-color: inherit;" onclick="delete_attendance(<?php echo $row['id']; ?>)" ><i class="fa-solid fa-trash-can"></i></button>
                            &nbsp;<button type="button" style="color:orange; border:none; cursor:pointer; background-color: inherit;" onclick="update_attendance(<?php echo $row['id']; ?>)" ><i class="fa-solid fa-pen-to-square"></i></button></td>
                    </tr>
<?php
            }     
    }

    if(isset($_POST['find'])){
        $dateOne = $_POST['dateOne'];
        $dateTwo = $_POST['dateTwo'];
        $search = $_POST['search'];

        $sql = "SELECT * FROM `attendance` WHERE IS_EXIST = 1 AND `lrn` = '$search' AND `date` BETWEEN '$dateOne' AND '$dateTwo'";
        $result = $con->query($sql);

        while($row = $result->fetch_assoc()){
?>
                    <tr>
                        <td><?php echo $row['id'] ?></td>
                        <td><?php echo $row['lrn'] ?></td>
                        <td><?php echo $row['fullname'] ?></td>
                        <td><?php echo $row['grade'] ?></td>
                        <td><?php echo $row['section'] ?></td>
                        <td><?php echo $row['timein-am'] ?></td>
                        <td><?php echo $row['timeout-am'] ?></td>
                        <td><?php echo $row['timein-pm'] ?></td>
                        <td><?php echo $row['timeout-pm'] ?></td>
                        <td><?php echo $row['date'] ?></td>
                        <td><button type="button" style="color:red; border:none; cursor:pointer; background-color: inherit;" onclick="delete_attendance(<?php echo $row['id']; ?>)" ><i class="fa-solid fa-trash-can"></i></button>
                            &nbsp;<button type="button" style="color:orange; border:none; cursor:pointer; background-color: inherit;" onclick="update_attendance(<?php echo $row['id']; ?>)" ><i class="fa-solid fa-pen-to-square"></i></button></td>
                    </tr>
<?php
            }    
    }

    if(isset($_POST['findOnly'])){
        $search = $_POST['search'];

        $sql = "SELECT * FROM `attendance` WHERE IS_EXIST = 1 AND `lrn` = '$search'";
        $result = $con->query($sql);

        while($row = $result->fetch_assoc()){
?>
                    <tr>
                        <td><?php echo $row['id'] ?></td>
                        <td><?php echo $row['lrn'] ?></td>
                        <td><?php echo $row['fullname'] ?></td>
                        <td><?php echo $row['grade'] ?></td>
                        <td><?php echo $row['section'] ?></td>
                        <td><?php echo $row['timein-am'] ?></td>
                        <td><?php echo $row['timeout-am'] ?></td>
                        <td><?php echo $row['timein-pm'] ?></td>
                        <td><?php echo $row['timeout-pm'] ?></td>
                        <td><?php echo $row['date'] ?></td>
                        <td><button type="button" style="color:red; border:none; cursor:pointer; background-color: inherit;" onclick="delete_attendance(<?php echo $row['id']; ?>)" ><i class="fa-solid fa-trash-can"></i></button>
                            &nbsp;<button type="button" style="color:orange; border:none; cursor:pointer; background-color: inherit;" onclick="update_attendance(<?php echo $row['id']; ?>)" ><i class="fa-solid fa-pen-to-square"></i></button></td>
                    </tr>
<?php
            }   
    }

    if(isset($_POST['dateGrade'])){
        $grade = $_POST['grade'];
        $dateOne = $_POST['dateOne'];
        $dateTwo = $_POST['dateTwo'];

        $sql = "SELECT * FROM `attendance` WHERE IS_EXIST = 1 AND `grade` = '$grade' AND `date` BETWEEN '$dateOne' AND '$dateTwo'";
        $result = $con->query($sql);

        while($row = $result->fetch_assoc()){
?>
                    <tr>
                        <td><?php echo $row['id'] ?></td>
                        <td><?php echo $row['lrn'] ?></td>
                        <td><?php echo $row['fullname'] ?></td>
                        <td><?php echo $row['grade'] ?></td>
                        <td><?php echo $row['section'] ?></td>
                        <td><?php echo $row['timein-am'] ?></td>
                        <td><?php echo $row['timeout-am'] ?></td>
                        <td><?php echo $row['timein-pm'] ?></td>
                        <td><?php echo $row['timeout-pm'] ?></td>
                        <td><?php echo $row['date'] ?></td>
                        <td><button type="button" style="color:red; border:none; cursor:pointer; background-color: inherit;" onclick="delete_attendance(<?php echo $row['id']; ?>)" ><i class="fa-solid fa-trash-can"></i></button>
                            &nbsp;<button type="button" style="color:orange; border:none; cursor:pointer; background-color: inherit;" onclick="update_attendance(<?php echo $row['id']; ?>)" ><i class="fa-solid fa-pen-to-square"></i></button></td>
                    </tr>
<?php
            }   

    }

    if(isset($_POST['dateGradeLevel'])){
        $grade = $_POST['grade'];
        $section = $_POST['section'];
        $dateOne = $_POST['dateOne'];
        $dateTwo = $_POST['dateTwo'];

        $sql = "SELECT * FROM `attendance` WHERE IS_EXIST = 1 AND `grade` = '$grade' AND `section` = '$section' AND `date` BETWEEN '$dateOne' AND '$dateTwo'";
        $result = $con->query($sql);

        while($row = $result->fetch_assoc()){
?>
                    <tr>
                        <td><?php echo $row['id'] ?></td>
                        <td><?php echo $row['lrn'] ?></td>
                        <td><?php echo $row['fullname'] ?></td>
                        <td><?php echo $row['grade'] ?></td>
                        <td><?php echo $row['section'] ?></td>
                        <td><?php echo $row['timein-am'] ?></td>
                        <td><?php echo $row['timeout-am'] ?></td>
                        <td><?php echo $row['timein-pm'] ?></td>
                        <td><?php echo $row['timeout-pm'] ?></td>
                        <td><?php echo $row['date'] ?></td>
                        <td><button type="button" style="color:red; border:none; cursor:pointer; background-color: inherit;" onclick="delete_attendance(<?php echo $row['id']; ?>)" ><i class="fa-solid fa-trash-can"></i></button>
                            &nbsp;<button type="button" style="color:orange; border:none; cursor:pointer; background-color: inherit;" onclick="update_attendance(<?php echo $row['id']; ?>)" ><i class="fa-solid fa-pen-to-square"></i></button></td>
                    </tr>
<?php
            }   
    }

    if(isset($_GET['getGrades'])){
        $sql = "SELECT `grade` FROM `grade` WHERE IS_EXIST = 1";
        $result = $con->query($sql);
?>
        <option value="" selected>--select grade--</option>
<?php
        while($row = $result->fetch_assoc()){
?>
        <option value="<?php echo $row['grade'] ?>"><?php echo $row['grade'] ?></option>
<?php
        }
    }

    if(isset($_POST['getSections'])){
        $grade = $_POST['getSections'];

        $sql = "SELECT `section` FROM `grade-section` WHERE IS_EXIST = 1 AND `grade` = '$grade'";
        $result = $con->query($sql);
?>
         <option value="" selected>--select section--</option>
<?php
        while($row = $result->fetch_assoc()){
?>
        <option value="<?php echo $row['section'] ?>"><?php echo $row['section'] ?></option>
<?php
        }
    }
?>