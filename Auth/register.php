<?php 
include "../Partials/db.php";

$sql = "SELECT * FROM `userroles`";

$res = mysqli_query($connect, $sql);

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../Assets/Css/register.css">
    <link rel="stylesheet" href="../Assets/Css/style.css">
    <title>SignUpForm</title>
</head>

<body>
    <div class="container">
    <div class="content">
        <div class="start">
            <div class="logo">Letsers</div>
            <div class="about">
                <div class="text">Start your journey with us.</div>
                <div class="desc">Discover the world's best community of Engineers and Architectures.</div>
            </div>
        </div>
        <div class="form">
            <div class="intro">
                <div class="title">Sign Up</div>
                <div class="login">Have an account? <a href="./login.php" class="login-link">Login</a></div>
            </div>
            <form id="signupForm" action="./process.php" method="POST" enctype="multipart/form-data">
                <div class="looking-for">
                    <div class="form-input">
                        <div class="title">Select Your Role</div>
                        <select name="role" id="role">
                            <option value="">Select Role</option>
                            <?php if (mysqli_num_rows($res)>0):?>
                                <?php while ($row=mysqli_fetch_assoc($res)):?>
                                    
                                    <option value="<?php echo $row['RoleID']?>"><?php echo $row['RoleName']?></option>
                                    <?php endwhile?>
                                    <?php endif?>
                        </select>
                    </div>
                    <div class="form-input">
                        <div class="title">Username</div>
                        <input type="text" name="name" placeholder="Eg:John Doe" required>
                    </div>
                    <div class="form-input">
                        <div class="title">Email</div>
                        <input type="email" name="email" placeholder="E.g: johndoe@gmail.com" required>
                    </div>
                    <div class="form-input">
                        <div class="title">Password</div>
                        <input type="password" name="pass" placeholder="Enter your password" required>
                    </div>
                    <div class="form-input">
                        <div class="title">Upload Your Image</div>
                        <input type="file" class="tag-input" name="image" accept=".png,.webp,.jpg" required>
                        <div class="tag-list"></div>
                    </div>
                    <button class="btn" type="submit">Create account</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
document.getElementById('signupForm').addEventListener('submit', function(e) {
    e.preventDefault();

    var fileInput = document.querySelector('input[type="file"]');
    var file = fileInput.files[0];

    if (file) {
        if (file.size > 5 * 1024 * 1024) { // 5MB limit
            alert('File size should not exceed 5MB.');
            return;
        }

        var allowedTypes = ['image/png', 'image/webp', 'image/jpeg'];
        if (!allowedTypes.includes(file.type)) {
            alert('Only PNG, WEBP, and JPG files are allowed.');
            return;
        }
    }

    // If all validations pass, you can submit the form here
    this.submit();
});
</script>

</body>
</html>
