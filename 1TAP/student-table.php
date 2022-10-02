<?php 
    include "connect.php";

        if(isset($_POST['grade_only'])){
            $grade = $_POST['grade_only'];
            $sql = "SELECT * FROM `student-information` WHERE grade = '$grade' AND IS_EXIST = 1 ORDER BY lastname" ;
            $result = $con->query($sql);
        }
        elseif(isset($_POST['search']) && isset($_POST['grade']) && isset($_POST['section'])){
            $search = $_POST['search'];
            $grade = $_POST['grade'];
            $section = $_POST['section'];
            $sql = "SELECT * FROM `student-information` WHERE LRN = '$search' AND section = '$section' AND grade = '$grade' AND IS_EXIST = 1 ORDER BY lastname";
            $result = $con->query($sql);
        }
        elseif(isset($_POST['search']) && isset($_POST['grade'])){
            $search = $_POST['search'];
            $grade = $_POST['grade'];
            $sql = "SELECT * FROM `student-information` WHERE LRN = '$search' AND grade = '$grade' AND IS_EXIST = 1 ORDER BY lastname";
            $result = $con->query($sql);
        }
        elseif(isset($_POST['search']) && isset($_POST['section'])){
            $search = $_POST['search'];
            $section = $_POST['section'];
            $sql = "SELECT * FROM `student-information` WHERE LRN = '$search' AND section = '$section' AND IS_EXIST = 1 ORDER BY lastname";
            $result = $con->query($sql);
        }
        elseif(isset($_POST['section_only'])){
            $section = $_POST['section_only'];
            $sql = "SELECT * FROM `student-information` WHERE section = '$section' AND IS_EXIST = 1 ORDER BY lastname";
            $result = $con->query($sql);
        }
        elseif(isset($_POST['section']) && isset($_POST['grade'])){
            $section = $_POST['section'];
            $grade = $_POST['grade'];
            $sql = "SELECT * FROM `student-information` WHERE grade = '$grade' AND section = '$section' AND IS_EXIST = 1 ORDER BY lastname";
            $result = $con->query($sql);
        }
        elseif(isset($_POST['search'])){
            $search = $_POST['search'];
            $sql = "SELECT * FROM `student-information` WHERE LRN = '$search' AND IS_EXIST = 1 ORDER BY lastname";
            $result = $con->query($sql);
        }
        else{
            $sql = "SELECT * FROM `student-information` WHERE IS_EXIST = 1";
            $result = $con->query($sql);
        }
        
        while($row = $result->fetch_assoc()){
?>
            <tr>
                <td><?php echo $row['id']; ?></td>
                <td><?php echo $row['RFID']; ?></td>
                <td><?php echo $row['LRN']; ?></td>
                <td><?php echo $row['lastname']; ?></td>
                <td><?php echo $row['firstname']; ?></td>
                <td><?php echo $row['MI']; ?></td>
                <td><?php echo $row['grade']; ?></td>
                <td><?php echo $row['section']; ?></td>
                <td><?php echo $row['parent']; ?></td>
                <td><?php echo $row['parentno']; ?></td>
                <td><?php echo $row['address']; ?></td>
                <td><button style="color:red; border:none; cursor:pointer; background-color: inherit;" onclick="delete_student(<?php echo $row['id']; ?>)" ><i class="fa-solid fa-trash-can"></i></button>
                &nbsp;<button style="color:orange; border:none; cursor:pointer; background-color: inherit;" onclick="update_student(<?php echo $row['id']; ?>)" ><i class="fa-solid fa-pen-to-square"></i></button></td>    
            </tr>
<?php
        }
// // DELETE STUDENT FUNCTION
//         if(isset($_GET['delete_id'])){
//             $student_id = $_GET['delete_id'];

//             $sql = "UPDATE `student-information` SET `IS_EXIST` = 0 WHERE `id` = '$student_id' ";
//             $delete_student = $con->query($sql);

//             if ($delete_student) {
//                 $delete_student = array('status' => true, 'message' => 'Record deleted successfully.');
//             }else{
//                 $delete_student = array('status' => true, 'message' => $conn->error);
//             }
        
//             echo json_encode($delete_student);exit();
//         }
        
?>

