<?php 

    include('../config/constants.php');
    
    if(isset($_GET['id']) && isset($_GET['image_name']))
    {
        $id = $_GET['id'];
        $image_name = $_GET['image_name'];
        if($image_name!="")
        {
            $path = "../images/ganpati/".$image_name;
            $remove = unlink($path);
            if($remove==false)
            {
                $_SESSION['upload'] = "<div class = 'error'>Failed to Remove Image File.</div>";//here chance of errors
                header('location:'.SITEURL.'admin/manage-ganpati.php');
                die();
            }
        }
        $sql = "DELETE FROM table_ganpati WHERE id=$id";
        $res = mysqli_query($conn ,$sql);
        if($res==true)
        {
            $_SESSION['delete'] = "Murti Deleted Successfully.";
            header('location:'.SITEURL.'admin/manage-ganpati.php');

        }
        else{
            $_SESSION['delete'] = "Failed to Delete Murti.";
            header('location:'.SITEURL.'admin/manage-ganpati.php');
        }
    }
    else
    {
        $_SESSION['unauthorize'] = "Unauthorized Access";
        header('location:'.SITEURL.'admin/manage-ganpati.php');
    }
?>