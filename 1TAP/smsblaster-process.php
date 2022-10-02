<?php
    include "connect.php";

    if(isset($_GET['byGrade']) || isset($_GET['allGrade'])){
        $sql = "SELECT * FROM `grade` WHERE IS_EXIST = 1";
        $result = $con->query($sql);

?>
            <option disabled selected>--select grade--</option>
<?php
        while($row = $result->fetch_assoc()){
?>
            <option value="<?php echo $row['grade']?>"><?php echo $row['grade'] ?></option>
<?php
        }

        echo $byGrade_response;
    }

    if(isset($_GET['bySection']) || isset($_GET['allSection'])){

            $sql = "SELECT * FROM `grade-section` WHERE IS_EXIST = 1";
            $result = $con->query($sql);

?>
            <option disabled selected>--select section--</option>
<?php
        while($row = $result->fetch_assoc()){
?>
            <option value="<?php echo $row['section']?>"><?php echo $row['section'] ?></option>
<?php
        }

        echo $bySection_response;
    }

    if(isset($_GET['gradeid'])){
    $gradeid = $_GET['gradeid'];
        $sql = "SELECT * FROM `grade-section` WHERE grade = '$gradeid' AND IS_EXIST = 1";
        $result = $con->query($sql);

?>
            <option disabled selected>--select section--</option>
<?php
        while($row = $result->fetch_assoc()){
?>
            <option value="<?php echo $row['section']?>"><?php echo $row['section'] ?></option>
<?php
        }

        echo $SectionFilter_response;
    }

    if(isset($_POST['smstrigger'])){
        $category = $_POST['category1'];
        $data = json_decode($_POST['data']);
        $objreciever = (object) $data;

        if($category == "grade"){
                $grade = $objreciever->{'data2'};
                $sms = $objreciever->{'data1'};
                $sql = "SELECT `parentno` FROM `student-information` WHERE grade = '$grade' AND IS_EXIST = 1";
        }
        elseif($category == "section"){
                $section = $objreciever->{'data2'};
                $sms = $objreciever->{'data1'};
                $sql = "SELECT `parentno` FROM `student-information` WHERE section = '$section' AND IS_EXIST = 1";
        }
        else{
                $sms = $objreciever->{'data1'};
                $sql = "SELECT `parentno` FROM `student-information` WHERE IS_EXIST = 1";
        }

        $result = $con->query($sql);
        
        while($row = $result->fetch_assoc()){
                $number[] = $row['parentno'];
        }

        echo json_encode($number);exit();
    }

?>