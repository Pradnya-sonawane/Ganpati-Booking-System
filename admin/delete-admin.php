<?php 

include('../config/constants.php');
$id = $_GET['id'];
$sql = "DELETE FROM table_admin WHERE id=$id";
$res = mysqli_query($conn ,$sql);

if($res==true)
{
    $_SESSION['delete'] = "Admin Deleted Successfully";
    header('location:'.SITEURL.'admin/manage-admin.php');
}
else
{
    $_SESSION['delete'] = "Failed to Delete Admin";
    header('location:'.SITEURL.'admin/manage-admin.php');
}
?>