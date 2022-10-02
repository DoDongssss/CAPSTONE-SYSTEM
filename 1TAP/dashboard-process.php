<?php
    include "connect.php";
    date_default_timezone_set('Asia/Manila');

    if(isset($_GET['studentValue'])){
        $sql = "SELECT `IS_EXIST` FROM `student-information` WHERE IS_EXIST = 1";
        $result = $con->query($sql);
        $studentValue = $result->num_rows;
        
?>
        <span><?php echo $studentValue ?></span>
<?php
    }
    if(isset($_GET['teacherValue'])){
        $sql = "SELECT `IS_EXIST` FROM `teacher-information` WHERE IS_EXIST = 1";
        $result = $con->query($sql);
        $teacherValue = $result->num_rows;
?>
        <span><?php echo $teacherValue ?></span>
<?php
    }
    if(isset($_GET['timeinValue'])){
        $date = date("Y/m/d");
        $sqlAM = "SELECT `timein-am` FROM `attendance` WHERE IS_EXIST = 1 AND `timein-am` != '' AND `date` = '$date' ORDER BY updatedAt Desc";
        $sqlPM = "SELECT `timein-pm` FROM `attendance` WHERE IS_EXIST = 1 AND `timein-pm` != '' AND `date` = '$date' ORDER BY updatedAt Desc";

        $resultAM = $con->query($sqlAM);
        $resultPM = $con->query($sqlPM);

        $timeinValueAM = $resultAM->num_rows;
        $timeinValuePM = $resultPM->num_rows;

        if($timeinValueAM > 0 && $timeinValuePM > 0){
?>
        <span><?php echo $timeinValueAM." / ".$timeinValuePM?></span>
<?php
        }
        elseif($timeinValueAM > 0 && !$timeinValuePM > 0){
?>
        <span><?php echo $timeinValueAM." / "."0"?></span>
<?php
        }
        elseif(!$timeinValueAM > 0 && $timeinValuePM > 0){
?>
        <span><?php echo "0"." / ".$timeinValuePM?></span>
<?php
        }
        else{
?>
        <span><?php echo "0"." / "."0"?></span>
<?php
        }
    }
    if(isset($_GET['timeoutValue'])){
        $date = date("Y/m/d");

        $sqlAM = "SELECT `timeout-am` FROM `attendance` WHERE `IS_EXIST` = 1 AND `timeout-am` != '' AND `date` = '$date' ORDER BY updatedAt Desc";
        $sqlPM = "SELECT `timeout-pm` FROM `attendance` WHERE IS_EXIST = 1 AND `timeout-pm` != '' AND`date` = '$date' ORDER BY updatedAt Desc";

        $resultAM = $con->query($sqlAM);
        $resultPM = $con->query($sqlPM);
        
        $timeoutValueAM = $resultAM->num_rows;
        $timeoutValuePM = $resultPM->num_rows;

        if($timeoutValueAM && $timeoutValuePM){
?>
        <span><?php echo $timeoutValueAM." / ".$timeoutValuePM ?></span>
<?php
        }
        elseif($timeoutValueAM > 0 && !$timeoutValuePM > 0){
?>
        <span><?php echo $timeoutValueAM." / "."0" ?></span>
<?php
        }
        elseif(!$timeoutValueAM > 0 && $timeoutValuePM > 0){
?>
        <span><?php echo "0"." / ".$timeoutValuePM?></span>
<?php
        }
        else{
?>
        <span><?php echo "0"." / "."0" ?></span>
<?php
        }
    }


// GET THE DATA IN DATABASE AND DISPLAY INTO TABLE
    if(isset($_GET['getTimeIn'])){
        $time = date("H:i:s");
        $date = date("Y/m/d");

        if(strtotime($time) < strtotime("11:30")){
                $sql = "SELECT * FROM `attendance` WHERE IS_EXIST = 1 AND `timein-am` != '' AND `date` = '$date'  ORDER BY updatedAt desc";
                $result = $con->query($sql);

                if($result->num_rows > 0){
                        while($row = $result->fetch_assoc()){
?>     
                         <tr>
                                <td><?php echo $row['id'];?></td>
                                <td><?php echo $row['lrn'];?></td>
                                <td><?php echo $row['fullname'];?></td>
                                <td><?php echo $row['timein-am']?></td>
                                <td></td>
                        </tr>
<?php
                        }       
                }
                else{
?>
        
<?php
                }
        }
        elseif(strtotime($time) >= strtotime("11:30")){
                $sql = "SELECT * FROM `attendance` WHERE IS_EXIST = 1 AND `timein-pm` != '' AND `date` = '$date'  ORDER BY updatedAt desc";
                $result = $con->query($sql);
  
                if($result->num_rows > 0){
                        while($row = $result->fetch_assoc()){
?>     
                         <tr>
                                <td><?php echo $row['id'];?></td>
                                <td><?php echo $row['lrn'];?></td>
                                <td><?php echo $row['fullname'];?></td>
                                <td><?php echo $row['timein-pm']?></td>
                                <td></td>
                        </tr>
<?php
                        }       
                }
                else{
?>
        
<?php
                }
        }

    }

    if(isset($_GET['getTimeOut'])){
        $time = date("H:i:s");
        $date = date("Y/m/d");

        if(strtotime($time) < strtotime("11:30")){
                $sql = "SELECT * FROM `attendance` WHERE IS_EXIST = 1 AND `timeout-am` != '' AND `date` = '$date'  ORDER BY updatedAt desc";
                $result = $con->query($sql);

                if($result->num_rows > 0){
                        while($row = $result->fetch_assoc()){
?>     
                         <tr>
                                <td><?php echo $row['id'];?></td>
                                <td><?php echo $row['lrn'];?></td>
                                <td><?php echo $row['fullname'];?></td>
                                <td><?php echo $row['timeout-am'];?></td>
                                <td></td>
                        </tr>
<?php
                        }       
                }
                else{
?>
        
<?php
                }
        }
        elseif(strtotime($time) >= strtotime("11:30")){
                $sql = "SELECT * FROM `attendance` WHERE IS_EXIST = 1 AND `timeout-pm` != '' AND `date` = '$date'  ORDER BY updatedAt desc";
                $result = $con->query($sql);

                if($result->num_rows > 0){
                        while($row = $result->fetch_assoc()){
?>     
                         <tr>
                                <td><?php echo $row['id'];?></td>
                                <td><?php echo $row['lrn'];?></td>
                                <td><?php echo $row['fullname'];?></td>
                                <td><?php echo $row['timeout-pm'];?></td>
                                <td></td>
                        </tr>
<?php
                        }       
                }
                else{
?>
        
<?php
                }
        }


    }
    

?>