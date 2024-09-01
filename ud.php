<?php include("connect.php"); 
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update/Delete</title>
    <link rel="stylesheet" href="udstyle.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>
<body>
    <!-- Include Navbar -->
    <?php include("navbar.html"); 
        //   echo "Welcome ".$_SESSION['user_name']."!!";
     ?>

    <div class="container">
        <h1>Update/Delete</h1>
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
                            <th>Operation</th> <!-- New Operation Column -->
                        </tr>';
                while($row = mysqli_fetch_assoc($data)) {
                    echo "<tr>
                            <td><img src='".$row["images"]."' alt='No photo'></td>
                            <td>".$row['description']."</td>
                            <td>
                                <a href='update.php?id=$row[id]' class='btn-update'><i class='fas fa-edit'></i> Update</a>
                                <a href='delete.php?id=".$row['id']."' class='btn-delete' onclick = 'return checkdelete()'><i class='fas fa-trash-alt'></i> Delete</a>
                            </td>
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
<script>
    function checkdelete()
    {
        return confirm('Are you sure you want to delete this data?');
    }
</script>