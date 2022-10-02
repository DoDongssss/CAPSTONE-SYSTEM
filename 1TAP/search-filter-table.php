<?php
    include "connect.php";
        if(isset($_POST['hasGrade'])){
            $get_grade = $_POST['hasGrade'];
             if($get_grade != "ALL"){
                $sql = "SELECT * FROM `grade-section` WHERE grade = '$get_grade'  AND IS_EXIST = 1";
                $result = $con->query($sql);
             }
             elseif($get_grade == "ALL"){
                $sql = "SELECT * FROM `grade-section` WHERE IS_EXIST = 1";
                $result = $con->query($sql);
             }
?>
                <option value = "ALL" >--select section--</option>
<?php
            while($row = $result->fetch_assoc()){
?>
                <option class="option" value="<?php echo $row['section']?>"><i class="fa-regular fa-folder-open"></i><?php echo $row['section'] ?></option>
<?php
        }
    }
?>