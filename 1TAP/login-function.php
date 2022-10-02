<?php

$response = array(
    "status" => false,
    "message" => "Form Failed!",
    "inputred" => "red",
    "calendar" => ""

);

session_start();

$errorEmpty = false;
// $errorEmail = false;
// $verify = false;

include "connect.php";



if (isset($_POST['username']) || isset($_POST['password'])) {

    $username = $con->real_escape_string($_POST['username']);
    $password = $con->real_escape_string($_POST['password']);

    if (!empty($username) && !empty($password)) {

        $sql = "SELECT * FROM `login-admin` WHERE BINARY username = ? AND IS_EXIST = 1";
        $stmt = $con->prepare($sql);
        $stmt->bind_param("s", $username);
        $stmt->execute();
        $result = $stmt->get_result();
        
        if ($result->num_rows == 1) { 
            $row = $result->fetch_assoc();
            if (password_verify($password, $row['password'])) {
                $response['inputred'] = "allblue";
                if (isset($_POST['remember_me'])) {

                	$id = $row['id'];
                    setcookie("id", $id, time() + 86400);

                    $response['message'] = "Successfully Login";
                    $response['status'] = true;
                    $_SESSION['status'] = true;
                } else {

                    $_SESSION['username'] = $username;
                    $response['message'] = "Successfully Login";
                    $response['status'] = true;
                    $_SESSION['status'] = true;
                }
            } else {

                $response['message'] = "Combination does not exist.";
                $response['status'] = false;
                //$response['message'] = " <script> window.location = 'login-session.php' </script> ";

            }
        } else {
            $response['message'] = "Combination does not exist.";
            $response['status'] = false;
            //$response['message'] = " <script> window.location = 'login-session.php' </script> ";
        }

    } else {
        if (empty($username) && !empty($password)) {

            $response['message'] = "All Fields are required!";
            $response['inputred'] = "userred";
        } else if (!empty($username) && empty($password)) {

            $response['message'] = "All Fields are required!";
            $response['inputred'] = "passred";
        } else {

            $response['message'] = "All Fields are required!";
            $errorEmpty = true;
        }
    }
} else {
    $response['status'] = false;
}

echo json_encode($response);