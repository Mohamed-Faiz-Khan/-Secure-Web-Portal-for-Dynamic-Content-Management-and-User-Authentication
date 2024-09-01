
<?php
include("connect.php");

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="forgotpasswordstyle.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <title>Account Recovery</title>
</head>
<body>
    <div class="center">
        <h1>Account Recovery</h1>
        <form action="#" method="POST" autocomplete='off'>
            <div class="form">
                <div class="textfield-container">
                    <input type="password" name="securitykey" id='sk' class="textfield password" placeholder="Enter SecretKey" required>
                    <i class="fas fa-eye toggle-password"></i>
                </div>
                <input type="submit" name="submit" value="Submit" class="btn">
                <div class="login">LogIn to your Account? <a href="login.php" class="link">LogIn Here</a></div>
            </div>
        </form>
    </div>
    <script>
        document.querySelector('.toggle-password').addEventListener('click', function (e) {
            const passwordField = document.querySelector('.password');
            const type = passwordField.getAttribute('type') === 'password' ? 'text' : 'password';
            passwordField.setAttribute('type', type);
            this.classList.toggle('fa-eye-slash');
        });
    </script>

<?php
    if ($_POST['submit']) {
        

        $securitykey = $_POST["securitykey"];
        $query = "SELECT * FROM signin WHERE securitykey='$securitykey'";
        $data = mysqli_query($con,$query);
        $total = mysqli_num_rows($data);

        if ($total > 0) {
            echo '<center>
                    <table>
                        <tr>
                            <th>Username</th>
                            <th>Password</th>
                        </tr>';
            while($row = mysqli_fetch_assoc($data)) {
                echo '<tr>
                        <td>'.$row["username"].'</td>
                        <td>'.$row["password"].'</td>
                      </tr>';
            }
            echo '</table></center>';
        } else {
            echo '<center>No records found</center>';
        }
    }
    ?>
</body>
</html>
