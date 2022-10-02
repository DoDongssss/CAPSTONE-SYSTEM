<?php
    include "connect.php";
    // include "getID.php";


    if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["action"])){
        switch ($_POST['action']) {
            case 'insertRecord':
            insertRecord();
            break;
            case 'showProcess':
            showProcess();
            default:
            break;
        }
    }

    function insertRecords() {
    }

    function displayRecords(){

    }

    function deleteRecords(){

    }

    function editRecords(){

    }


    if (isset($_GET['get_users'])) {
        $sql = "SELECT * FROM `student`";
        $result = $con->query($sql);

        if ($result->num_rows > 0) {
            //output data of each row
            while ($row = $result->fetch_assoc()) {
        ?>
    
        <tr>
            <td><?php echo $row['RFID']; ?></td>
            <td><?php echo $row['LRN']; ?></td>
            <td><?php echo $row['LastName']; ?></td>
            <td><?php echo $row['FirstName']; ?></td>
            <td><?php echo $row['MI']; ?></td>
            <td><?php echo $row['Parent']; ?></td>
            <td><?php echo $row['mobile']; ?></td>
            <td><?php echo $row['address']; ?></td>
            <td><button class="btn btn-info" onclick="edit_record(<?php echo $row['id']; ?>)" >Edit</button>&nbsp;<button class="btn btn-danger"  onclick="delete_record(<?php echo $row['id']; ?>)" >Delete</button></td>
        </tr>   
                    
        <?php
            }
        }
    }


?>