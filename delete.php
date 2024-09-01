<?php 
include("connect.php"); 
session_start();
$userprofile = $_SESSION['user_name'];
if($userprofile == true)
{
    $id = $_GET['id'];
    $query = "DELETE FROM form WHERE id='$id'";
    $data = mysqli_query($con, $query);
    if($data)
    {
        echo "<script>alert('Record Deleted Sucessfully.')</script>";
        ?>

        <meta http-equiv="refresh" content="0; url=http://localhost/DigiLocker%20Clone/displaycontent.php">
        <?php
    }
    else
    {
        echo "<script>alert('Failed to Delete Record Sucessfully.')</script>";
    }
}
else 
{
    header('location:login.php');
}
?>