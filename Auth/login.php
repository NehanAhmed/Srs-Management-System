<?php
    include "../Partials/db.php";

$sql = "SELECT * FROM `departments`";

$dropdown_res = mysqli_query($connect,$sql);
session_start();

if (isset($_POST['login'])) {
    $username = trim($_POST['username']);
    $dep_id = trim($_POST['dep-id']);
    $emp_id = trim($_POST['emp-id']);

    $query = "SELECT * FROM `user` WHERE emp_id =$emp_id AND dep_id=$dep_id";
    
    $res = mysqli_query($connect,$query);
    if (mysqli_num_rows($res) > 0) {
        $row = mysqli_fetch_assoc($res);
        
     
        $_SESSION['loggedin'] = true;
        $_SESSION['name'] = $row['name'];
        $_SESSION['emp_id'] = $row['emp_id'];
        $_SESSION['dep_id'] = $row['dep_id'];
        $_SESSION['dep'] = $row['department'];
        
        echo "<script>alert('login successful');window.location.href='../Dashboard/'</script>";
    } else {
        echo "<script>alert('No Result Found');</script>";
    }
        
        
    }
  















?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Srs Management System</title>
    <script src="https://kit.fontawesome.com/0a02fbb60a.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="./login.css">
    <link rel="stylesheet" href="../Dashboard/css/app.css">
</head>
<body class="auth-body">
    <div class="auth-container">
        <div class="auth-left">
            <img src="../Assets/Images/undraw_engineering-team_13ax.png" style="object-fit: contain;" alt="Background" class="auth-bg">
            <div class="overlay"></div>
            <div class="welcome-text">
                <h1>Srs Management System</h1>
                <p>Power up your operations with SRS Electrical Management System.</p>
            </div>
        </div>
        <div class="auth-right">
            <div class="auth-form-container">
<h1 style="text-align:center; font-size:60px; color:#222e3c">Admin </h1>
            <h3 style="text-align: center;">Access the Admin Panel</h3>
                <form class="auth-form" action="" method="POST">
                    <div class="input-group">
                        <span class="fa fa-user input-icon"></span>
                        <input type="text" name="username" placeholder="Username" required>
                    </div>
                    <div class="input-group">
                        <span class="fa fa-id-badge input-icon"></span>
                        <input type="number" name="dep-id" placeholder="Department Id" required>
                    </div>

                    <div class="input-group">
                        <span class="fa fa-id-card input-icon"></span>
                        <input type="number" name="emp-id" placeholder="Employee Id" required>
                    </div>

                    <div class="input-group">
                        
                        <select name="select" class="select-inp" id="select" style="width: 100%;
    padding: 1rem 2.5rem;
    border: 1.5px solid #e5e5e5;
    border-radius: 25px;
    font-size: 1rem;
    transition: all 0.3s ease;
    background-color: #f9f9f9;" required>
        <option value="select">Select Your Department</option>
                        <?php if(mysqli_num_rows($dropdown_res) >0  ):   ?>

<?php  
while($row=  mysqli_fetch_assoc($dropdown_res) ): ?>


    <option value="<?php echo $row['department_id']; ?>" style="padding: 1rem 2.5rem;
    border: 1.5px solid #e5e5e5;
    border-radius: 25px;
    font-size: 1rem;
    transition: all 0.3s ease;
    background-color: #f9f9f9;"> <?php echo $row['department_name']; ?> </option>
<?php  endwhile; ?>
<?php  endif;?>
                        </select>
                    </div>
                   <button type="submit" name="login" value="login" class="auth-btn" value="Submit">Login</button>
                    
                </form>
               
            </div>
        </div>
    </div>
</body>
</html>