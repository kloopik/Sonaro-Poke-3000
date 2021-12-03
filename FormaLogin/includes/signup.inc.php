<?php

    if(isset($_POST['submit'])) {
        include_once 'db.inc.php';
        $first = mysqli_real_escape_string($conn, $_POST['first']);
        $last = mysqli_real_escape_string($conn, $_POST['last']);
        $email = mysqli_real_escape_string($conn, $_POST['email']);
        $uid = mysqli_real_escape_string($conn, $_POST['uid']);
        $pwd = mysqli_real_escape_string($conn, $_POST['pwd']);
        $cpwd = mysqli_real_escape_string($conn, $_POST['cpwd']);
        
        if(empty($first) || empty($last) || empty($email) || empty($uid) || empty($pwd) || empty($cpwd)) {
           $_SESSION ['status'] = "signup is empty";
            header("Location: ../signup.php?signup=empty");
            exit();
        } else {
            if(!preg_match("/^[a-zA-Z]*$/", $first) || !preg_match("/^[a-zA-Z]*$/", $last)) {
                header("Location: ../signup.php?signup=name A-Z");
                exit();
            } else {
                if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                    header("Location: ../signup.php?signup=invalidemail");
                    exit();
                } else {
                    $sql = "SELECT * FROM users WHERE user_uid = '$uid'";
                    $result = mysqli_query($conn, $sql);
                    $result_check = mysqli_num_rows($result);
                    if($result_check > 0) {
                        header("Location: ../signup.php?signup=usertaken");
                        exit();
                    } else {
                        if(!preg_match("/^[A-Z0-9]*$/", $pwd)) {
                            header("Location: ../signup.php?pasword=neteisingas");
                            exit();
                        } else {
                            if($pwd !== $cpwd) {
                                header("Location: ../signup.php?pasword=nesutampa");
                                exit();
                    } else {
                        $hashedPwd = password_hash($pwd, PASSWORD_DEFAULT);
                        $sql = "INSERT INTO users (user_first, user_last, user_email, user_uid, user_pwd) VALUES('$first','$last','$email','$uid','$hashedPwd');";
                        mysqli_query($conn, $sql);
                        header("Location: ../signup.php?signup=success");
                        exit();
                    }
                    }
                }
            }
        }
    }
    } else {
        header("Location: ../signup.php");
        exit();
    }