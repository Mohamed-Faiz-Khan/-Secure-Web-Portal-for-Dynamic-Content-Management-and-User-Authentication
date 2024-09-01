<?php
    include("connect.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SignIn Form</title>
    <link rel="stylesheet" href="signinstyle.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>
<body>
    <div class="center">
        <h1>SignIn</h1>
        <form action="#" method="POST" autocomplete='off'>
            <div class="form">
                <label>Enter your username:</label>
                <input type="text" name="username" class="textfield" placeholder="Enter Username" required>
                <label>Enter your password:</label>
                <input type="password" name="password" class="textfield" placeholder="Enter Password" required>
                <label>Enter a security key:</label>
                <div class="textfield-container">
                    <input type="password" name="securitykey" class="textfield" placeholder="Enter Security Key" required>
                    <i class="fas fa-info-circle tooltip-icon"></i>
                    <span class="tooltip-text">By providing the security key we can retrieve the username and password</span>
                </div>
                <input type="submit" name="signin" value="SignIn" class="btn">
                <div class="login">Already have an account? <a href="login.php" class="link">LogIn Here</a></div>
            </div>
        </form>
    </div>
</body>
</html>


<?php
 if($_POST['signin'])
  {

    $username=$_POST['username'];
    $pwd=$_POST['password'];
    $sk=$_POST['securitykey'];


    $query = "SELECT * FROM signin WHERE username='$username' ";
    $check = mysqli_query($con,$query);
    $total = mysqli_num_rows($check);
    if($total == 1)
    {
        echo "<script> alert('Username already exist. Please provide a different username.') </script>";
    }
    else
    {
        $query = "INSERT INTO signin (username,password,securitykey) VALUES('$username','$pwd','$sk')";
        $data = mysqli_query($con,$query);
		if($data)
		{
			echo "<script> alert('Data Inserted into Database') </script>";
		}
		else
		{
			echo "<script> alert('Data is not Inserted into Database') </script>";
		}

    }
  }
?>  

