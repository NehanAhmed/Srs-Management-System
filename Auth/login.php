<?php
session_start(); // Make sure session is started

include "../Partials/db.php";

if (isset($_POST['login'])) {
    $email =  $_POST['email'];
    $password = $_POST['pass'];

    // Prepared statement to prevent SQL injection
    $sql = "SELECT * FROM `users` WHERE Email = ?";
    $stmt = mysqli_prepare($connect, $sql);
    mysqli_stmt_bind_param($stmt, "s", $email); // "s" means the parameter is a string
    mysqli_stmt_execute($stmt);
    $res = mysqli_stmt_get_result($stmt);

    if (mysqli_num_rows($res) > 0) {
        $row = mysqli_fetch_assoc($res);
        if (password_verify($password, $row['PasswordHash'])) {
            $_SESSION['loggedin'] = true;
            $_SESSION['name'] = $row['UserName'];
            $_SESSION['profileImg'] = $row['profileImg'];
            $_SESSION['Email'] = $row['Email'];
            $_SESSION['RoleID'] = $row['RoleID'];
            $_SESSION['dep_id'] = $row['dep_id'];
            echo "<script>
                
                window.location.href = '../Dashboard/index.php';
              
            </script>";
            
        } else {
            echo "<script>alert('Invalid Password');</script>";
        }
    } else {
        echo "<script>alert('No Result Found');</script>";
    }

    mysqli_stmt_close($stmt);
}
?>






<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <!-- ===== CSS ===== -->
        <link rel="stylesheet" href="../Assets/Css/login.css">

        <!-- ===== BOX ICONS ===== -->
        <link href='https://cdn.jsdelivr.net/npm/boxicons@2.0.5/css/boxicons.min.css' rel='stylesheet'>

        <title>Login form responsive</title>  
    </head>
    <body>
        <div class="l-form">
            <div class="shape1"></div>
            <div class="shape2"></div>

            <div class="form">
                <img src="../Assets/Images/authentication.svg" alt="" class="form__img">

                <form action="" method="POST" class="form__content">
                    <h1 class="form__title">Welcome</h1>

                    <div class="form__div form__div-one">
                        <div class="form__icon">
                            <i class='bx bx-user-circle'></i>
                        </div>

                        <div class="form__div-input">
                            <label for="" class="form__label">Email</label>
                            <input type="email" class="form__input" name="email" required>
                        </div>
                    </div>

                    <div class="form__div">
                        <div class="form__icon">
                            <i class='bx bx-lock' ></i>
                        </div>

                        <div class="form__div-input">
                            <label for="" class="form__label">Password</label>
                            <input type="password" class="form__input" name="pass" required>
                        </div>
                    </div>
                    <input type="submit" class="form__button" value="Login" name="login">

                   <div class="create-acc">
                    <p>Don't have an account? <a href="register.php">Create one</a></p>
                   </div>
                </form>
            </div>

        </div>
        
        <!-- ===== MAIN JS ===== -->
        <script src="../Assets/JS/login.js"></script>
    </body>
</html>
