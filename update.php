<?php 
include("connect.php"); 
session_start();
$userprofile = $_SESSION['user_name'];
if($userprofile == true)
{
$id = $_GET['id'];
$query = "SELECT * FROM form WHERE id='$id'";
$data = mysqli_query($con, $query);
$row = mysqli_fetch_assoc($data);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Page</title>
    <link rel="stylesheet" href="uploadstyle1.css">
</head>
<body>
    <?php include("navbar.html"); ?>
    <form id="uploadForm" action="" method="POST" enctype="multipart/form-data">
        <div class="container">
            <h2>Update Page</h2>
            <div class="input_field">
                <label>Image:</label>
                <input type="file" name="image" class="textfield">
                <p>Current Image: <img src="<?php echo $row['images']; ?>" alt="No Image" width="100"></p> 
            </div>
            <div class="input_field">
                <label>Description:</label>
                <textarea class="textarea" name="description" required><?php echo $row['description']; ?></textarea>
            </div>
            <div class="input_field">
                <input type="submit" value="Update" name="submit" class="btn">
            </div>
        </div>
    </form>
</body>
</html>

<?php


if (isset($_POST['submit'])) {
    // Handling image upload
    $filename = $_FILES["image"]["name"];
    $tmpname = $_FILES["image"]["tmp_name"];
    
    // Check if a new image is uploaded
    if ($filename) {
        $folder = "images/" . $filename;
        move_uploaded_file($tmpname, $folder);
    } else {
        // If no new image is uploaded, use the existing image path
        $folder = $row['images'];
    }

    // Get the updated description
    $desc = $_POST['description'];

    // Update query
    $query = "UPDATE form SET images='$folder', description='$desc' WHERE id='$id'";
    $data = mysqli_query($con, $query);

    if ($data) {
        echo "<script>alert('Data Updated Successfully'); window.location.href='displaycontent.php';</script>";
    } else {
        echo "<script>alert('Failed to Update Data');</script>";
    }
}
}
else
{
    header('location:login.php');
}
?>
