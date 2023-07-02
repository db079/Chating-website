<?php
    session_start();
    include_once "config.php";
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);

    if(!empty($email) && !empty($password)){
        $sql = mysqli_query($conn, "SELECT * FROM users WHERE `email` = '{$email}' AND `password` ='{$password}'");
        if(mysqli_num_rows($sql)>0){
            $row = mysqli_fetch_assoc($sql);
            $status = "Active now";
            $sql_new = mysqli_query($conn, "UPDATE users SET `status` = '{$status}' WHERE unique_id = '{$row['unique_id']}'");
            if($sql_new){
                $_SESSION['unique_id'] = $row['unique_id'];
                echo "success";
            }
        }else{
            echo "Email or Password is incorrect!";
        }
        // lets check user enter email & password is matched
    }
    else{
        echo "All input feilds are required!";
    }
?>