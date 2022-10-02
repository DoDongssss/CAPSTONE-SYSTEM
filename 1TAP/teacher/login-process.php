<?php
    include "connect.php";
    session_start();
    date_default_timezone_set('Asia/Manila');
    $time = date("H:i:s");

    if(isset($_POST['user']) || isset($_POST['pass'])){
        $username = $con->real_escape_string($_POST['user']);
        $password = $con->real_escape_string($_POST['pass']);

        if(!empty($username) && !empty($password)){
            $sql = "SELECT * FROM `login-teacher` WHERE `username` = '$username' AND IS_EXIST = 1";
            $result = $con->query($sql);

            if($result->num_rows == 1){
                $row = $result->fetch_assoc();
                // check the password
                if(password_verify($password, $row['password'])){
                    // return json if the condition is true
                    $loginResult = array('status' => true, 'message' => "Successfully Login");
                    // get the username of the user and insert into session
                    $_SESSION['user'] = $username;
                }
                else{
                    // return json if the condition is false
                    $loginResult = array('status' => false, 'message' => "Invalid Login");
                }
            }
            else{
                // return json if the condition is false
                $loginResult = array('status' => false, 'message' => "Invalid Login");
            }
        }
        
        echo json_encode($loginResult);exit();
    }

    // LOGIN
    if(isset($_POST['sessionActive'])){
        $_SESSION['status-teacher'] = true;
    }
    // LOGOUT
    if(isset($_POST['sessionDestroy'])){
        $_SESSION['status-teacher'] = false;
    }

    // get bubble greetings
    if(isset($_GET['getBubble'])){
        $user = $_SESSION['user'];
        $sql = "SELECT `lastname` FROM `teacher-information` where `teacherid` = '$user'";
        $result = $con->query($sql);
        $row = $result->fetch_assoc();
        if($time > "12:00"){
?>
            <h2>Good Afternoon Teacher <?php echo $row['lastname']?> &#128526;</h2>
<?php
        }
        else{
?>
            <h2>Good Morning Teacher <?php echo $row['lastname']?> &#129312;</h2>
<?php
        }
    }
?>