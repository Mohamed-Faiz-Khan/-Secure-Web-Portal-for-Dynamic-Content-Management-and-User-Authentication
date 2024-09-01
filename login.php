<?php
    include("connect.php");
    session_start();
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="loginstyle.css">
    <title>Login</title>
</head>
<body>
    <div class="center">
        <h1>Login</h1>
        <form action="#" method="POST" autocomplete='off'>
            <div class="form">
                <input type="text" name="username" class="textfield" placeholder="Username" required>
                <input type="password" name="password" class="textfield" placeholder="Password" required>
                <div class="forgotpass"><a href="forgotpassword.php" class="link">Forgot Password?</a></div>
                <input type="submit" name="login" value="Login" class="btn">
                <div class="signup">New Member? <a href="signin.php" class="link">SignUp Here</a></div>
            </div>
        </div>
    </form>
</body>
</html>

<?php
  if($_POST['login'])
  {
    $username=$_POST['username'];
    $pwd=$_POST['password'];
    $query = "SELECT * FROM signin WHERE username='$username' && password='$pwd' ";
    $data = mysqli_query($con,$query);
    $total = mysqli_num_rows($data);
    if($total == 1)
    {
        $_SESSION['user_name'] = $username;
        header('location:displaycontent.php');
    }
    else 
    {
        echo "<script> alert('Invalid  Username or Password.') </script>";
    }

  }  

?>