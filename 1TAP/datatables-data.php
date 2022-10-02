<?php 
    include "connect.php";

    $sql = "SELECT * FROM `student`";
    $result = $con->query($sql);

    $rows = array();
    while($row = $result->fetch_assoc()){
        $rows[] = $row;
    }
    echo json_encode($rows);
?>