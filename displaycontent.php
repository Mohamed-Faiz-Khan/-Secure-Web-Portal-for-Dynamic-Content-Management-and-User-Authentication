<?php include("connect.php"); 
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Display Content</title>
    <link rel="stylesheet" href="displaycontentstyle.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>
<body>
    <!-- Include Navbar -->
    <?php include("navbar.html"); 
        //   echo "Welcome ".$_SESSION['user_name']."!!";
     ?>

    <div class="container">
        <h1>Content Display</h1>
        <?php
        $userprofile = $_SESSION['user_name'];
        if($userprofile == true)
        {
            $query = "SELECT * FROM form";
            $data = mysqli_query($con, $query);
            $total = mysqli_num_rows($data);

            if ($total > 0) {
                echo '<table>
                        <tr>
                            <th>Images</th>
                            <th>Description</th>
                        </tr>';
                while($row = mysqli_fetch_assoc($data)) {
                    echo "<tr>
                            <td><img src='".$row["images"]."' alt='No photo'></td>
                            <td>".$row['description']."</td>
                          </tr>";
                }
                echo '</table>';
            } else {
                echo '<div class="no-records">No records found</div>';
            }
        }
        else 
        {
            header('location:login.php');
        }
            
        ?>
    </div>
</body>
</html>
