<?php 
include("connect.php"); 
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upload Page</title>
    <link rel="stylesheet" href="uploadstyle1.css">
</head>
<body>
    <?php include("navbar.html"); ?>
    <form id="uploadForm" action="#" method="POST" enctype="multipart/form-data">
        <div class="container">
            <h2>Upload an Object</h2>
            <div class="input_field">
                <label>Image:</label>
                <input type="file" name="image" class="textfield" >
            </div>
            <div class="input_field">
                <label>Description:</label>
                <textarea class="textarea" name="description" required></textarea>
            </div>
            <div class="input_field">
                <input type="submit" value="Upload" name="submit" class="btn">
            </div>
        </div>
    </form>
</body>
</html>
<?php
$userprofile = $_SESSION['user_name'];
if($userprofile == true)
{

 if($_POST['submit'])
  {
    $filename = $_FILES["image"]["name"];
    $tmpname = $_FILES["image"]["tmp_name"];
    $folder = "images/".$filename;
    move_uploaded_file($tmpname,$folder);

    $desc=$_POST['description'];

    $query = "INSERT INTO form (images,description) VALUES('$folder','$desc')";
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
else
{
    header('location:login.php');
}
?>  
