<?php
    include "connect.php";

    $output='';
    
    if(isset($_POST['query'])){
        $search = $_POST['query'];
        $sql = "SELECT * FROM `student` WHERE Lastname LIKE CONCAT('%', ?,'%')";
        $stmt = $con->prepare($sql);
        $stmt->bind_param("s", $search);
    }else{
        if(isset($_GET["page"])){
            $page=$_GET["page"];
        }else{
            $page = 1;
        }
        $start_from =($page-1)*5;

        $sql = "SELECT * FROM `student` limit $start_from, $per_pages";
        $stmt = $con->prepare($sql);
    }
        $stmt->execute();
        $result = $stmt->get_result();

        if($result->num_rows > 0){
            $output ="
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>LRN</th>
                            <th>LAST NAME</th>
                            <th>FIRST NAME</th>
                            <th>MI</th>
                            <th>PARENT/GUARDIAN</th>
                            <th>MOBILE NO</th>
                            <th>ADDRESS</th>
                            <th>TOOLS</th>
                        </tr>
                    </thead>
                    <tbody>";
                    while($row = $result->fetch_assoc()){
                        $output .="
                                <tr>
                                    <td>".$row['RFID']."</td>
                                    <td>".$row['LRN']."</td>
                                    <td>".$row['LastName']."</td>
                                    <td>".$row['FirstName']."</td>
                                    <td>".$row['MI']."</td>
                                    <td>".$row['Parent']."</td>
                                    <td>".$row['mobile']."</td>
                                    <td>".$row['address']."</td>
                                    
                                </tr>"
                                ;
                                
                            }
                            $output .="</tbody>";
                                
                            echo $output;
                        }else{
                            echo "<h3>No Records Found!</h3>";
                        }
?>