<?php
include "../Partials/db.php";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    

 $upload_dir ="../Assets/Images/profileImg";
 //agr folder nahie hai tou create krey ga 
 if(!is_dir($upload_dir)){
 
     mkdir($upload_dir);
 }
 
 
 if(isset($_FILES['image'])){
 
 
     //this  for just checking the values of the file 
 echo"<pre>";
 print_r($_FILES);
 echo "</pre>";
 
 $file_name=$_FILES['image']['name'];
 $file_size=$_FILES['image']['size'];
 $file_tmp=$_FILES['image']['tmp_name'];
 $file_type=$_FILES['image']['type'];
 
 
  $target_file=$upload_dir.basename($file_name);
 
 //yeah function upload krney k liye used hota hai
 
 $UploadStatus= move_uploaded_file($file_tmp,$upload_dir.$file_name);
 
 
 
 }
 
    $name = htmlspecialchars($_POST['name']);
    $email = htmlspecialchars($_POST['email']);
    $pass = htmlspecialchars($_POST['pass']);
    $roleId = htmlspecialchars($_POST['role']);

    // Validate role ID
    $roleCheckSql = "SELECT RoleID FROM userroles WHERE RoleID = ?";
    $stmt = mysqli_prepare($connect, $roleCheckSql);
    mysqli_stmt_bind_param($stmt, "i", $roleId);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_store_result($stmt);

    if (mysqli_stmt_num_rows($stmt) == 0) {
        echo "<script>alert('Invalid role selected')</script>";
        exit();
    }
    mysqli_stmt_close($stmt);

    $hash = password_hash($pass, PASSWORD_DEFAULT);
    $sql = "INSERT INTO `users`(`UserName`, `Email`, `PasswordHash`, `RoleID`,`profileImg`) VALUES (?, ?, ?, ?,?)";
    $stmt = mysqli_prepare($connect, $sql);
    mysqli_stmt_bind_param($stmt, "sssis", $name, $email, $hash, $roleId,$target_file);
    $res = mysqli_stmt_execute($stmt);

    if ($res) {
        echo "<script>alert('Account created successfully!')</script>";
        header("Location: login.php");
    } else {
        echo "<script>alert('Error creating account: " . mysqli_error($connect) . "')</script>";
    }
    mysqli_stmt_close($stmt);

    


}else{
    echo "<script>alert('Server Request Error')</script>";

}
?>