<?php 
    session_start();
    include_once "config.php";
    $fname = mysqli_real_escape_string($conn, $_POST['fname']);
    $lname = mysqli_real_escape_string($conn, $_POST['lname']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);

    if(!empty($fname) && !empty($lname) && !empty($email) && !empty($password)){
        // lets check image is uploaded or not 
        
        // validation of email
        if(filter_var($email,FILTER_VALIDATE_EMAIL)){
            // lets check email is already exists
            $sql = mysqli_query($conn,"SELECT email FROM users WHERE email = '{$email}'");
            if(mysqli_num_rows($sql) > 0){
                echo "$email is already exits!!";
            }else{
                if(isset($_FILES['image'])){
                    $img_name = $_FILES['image']['name']; // this will take user image name
                    $temp_name = $_FILES['image']['tmp_name']; // this temporary name is used to save/move file

                    // lets explode image an ge the extension like jpg png or jpeg
                    $img_explode = explode('.',$img_name);
                    $img_ext = end($img_explode);  // get the users img extension 
                    
                    $extensions=['png','jpeg','jpg']; // some valid extension 
                    if(in_array($img_ext, $extensions) === true){  // validation
                        $time = time();  // this will return current time
                                         // use to rename file using current time
                                         // so all img file will have a unique image name 
                        $new_img_name = $time.$img_name;

                        if(move_uploaded_file($temp_name,"images/".$new_img_name)){
                            $status = "Active now";
                            $random_id = rand(time(),10000000);

                            // lets insert all user data inside timezone_abbreviations_list
                            // $sql2 = mysqli_query($conn, "INSERT INTO users (`unique_id`,`fname`,`lname`,`email`,`password`,`img`,`status`) 
                            // VALUES (`{$random_id}`,`{$fname}`,`{$lname}`,`{$email}`,`{$password}`,`{$new_img_name}`,`{$status}`)");
                            // INSERT INTO `users` (`user_id`, `unique_id`, `fname`, `lname`, `email`, `password`, `img`, `status`) VALUES (NULL, '1', 'Daya', 'Borkar', 'dayaborkar01@gmail.com', '1234', '1687887687DAYA_IMG23.jpeg', 'Active now');

                            $sql2 = mysqli_query($conn, "INSERT INTO users (unique_id, fname, lname, email, password, img, status)
                            VALUES ({$random_id}, '{$fname}','{$lname}', '{$email}', '{$password}', '{$new_img_name}', '{$status}')");
                            if($sql2){
                                // $sql3 = mysqli_query($conn,"SELECT * FROM users WHERE email = '$email'");
                                // if(mysqli_num_rows($sql3)>0){
                                //     $row = mysqli_fetch_assoc($sql3);
                                //     $_SESSION['unique_id']=$row['unique_id'];
                                //     echo "success";
                                // }
                                $select_sql2 = mysqli_query($conn, "SELECT * FROM users WHERE email = '{$email}'");
                                    if(mysqli_num_rows($select_sql2) > 0){
                                        $result = mysqli_fetch_assoc($select_sql2);
                                        $_SESSION['unique_id'] = $result['unique_id'];
                                        echo "success click below to login !!!";
                                    }else{
                                        echo "This email address not Exist!";
                                    }
                            }else{
                                echo "someting went wrong!!" . mysqli_error($conn);
                            }
                        }
                    }

                }else{
                    echo "upload image of png, jpg, jpeg!!";
                }
            }
        }else{
            echo $email." - is not a valid email";
        }
    }else{
        echo "All input are required";
    }
?>

