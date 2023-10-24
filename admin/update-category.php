<?php include('partials/menu.php'); ?>

<div class="main-content">
    <div class="wrapper">
        <h1>Update Category</h1>

        <br><br>

        <?php
             
             //check whether the id is set or not
             if(isset($_GET['id']))
             {
                //get tsxhe id and all other details
                //echo "Getting the Data";
                $id = $_GET['id'];
                //create sql query to get all other details 
                $sql = "SELECT * FROM table_category WHERE id=$id";

                //execute the query
                $res = mysqli_query($conn, $sql);

                //count the rows to check whether the id is valid or not 
                $count = mysqli_num_rows($res);

                if($count==1)
                {
                    //get all the data 
                    $row = mysqli_fetch_assoc($res);
                    $title = $row['title'];
                    $current_image = $row['image_name'];
                    $featured = $row['featured'];
                    $active = $row['active'];
                }
                else 
                {
                    //redirect to manage category with session message 
                    $_SESSION['no-category-found'] = "<div class='error'>Category not Found.</div>";
                    header('location:'.SITEURL.'admin/manage-category.php');
                }
            }
            else
            {
                //redirect to manage category
                header('location:'.SITEURL.'admin/manage-category.php');
            }
        ?>
        <form action="" method="POST" enctype="multipart/form-data">


        <table class="tbl=30">
            <tr>
                <td>Title: </td>
                <td>
                    <input type="text" name="title" value="<?php echo $title; ?>">
                </td>
        </tr>

        <tr>
           <td>Current Image: </td>
           <td>
               <?php
                   if($current_image != "")
                   {
                      //display the image 
                      ?>
                      <img src="<?php echo SITEURL; ?>images/category/<?php echo $current_image; ?>" width="150px">
                      <?php 
                   } 
                   else
                   {
                          //display message 
                          echo "<div class='error'>Image Not Added.</div>";
                   }
                ?>
        </td>
        </tr>

        <tr>
            <td>New Image: </td>
            <td>
                <input type="file" name="image">
            </td>
        </tr>

        <tr>
            <td>Featured: </td>
            <td>
                <input <?php if($featured=="Yes"){echo "checked";} ?> type="radio" name="featured" value="Yes"> Yes
                <input <?php if($featured=="NO"){echo "checked";} ?> type="radio" name="featured" value="NO"> No
            </td>
        </tr>
        
        <tr>
            <td>Active: </td>
            <td>
                <input <?php if($active=="Yes"){echo "checked";} ?> type="radio" name="active" value="Yes"> Yes
                <input <?php if($active=="No"){echo "checked";} ?> type="radio" name="active" value="No"> No
            </td>
        </tr>  
        
        <tr>
            <td>
                <input type="hidden" name="current_image" value="<?php echo $current_image; ?>">
                <input type="hidden" name="id" value="<?php echo $id; ?>">
                <input type="submit" name="submit" value="Update Category" class="btn-secondary">
            </td>
        </tr>    

</table>

</form>

        <?php 
            if(isset($_POST['submit']))
            {
              // echo "clicked";
              //1.get all the values from our form 
              $id = $_POST['id'];
              $title = $_POST['title'];
              $current_image = $_POST['current_image'];
              $featured = $_POST['featured'];
              $active = $_POST['active'];

              if(isset($_FILES['image']['name']))
              {
                 //get the image details 
                 $image_name = $_FILES['image']['name'];
         
                 //check whether the image is available or not
                 if($image_name != "")
                 {
                    $parts = explode('.', $image_name);
                $ext = end($parts);

                 //rename the image 
                $image_name= "Ganpati_category_".rand(000, 999).'.'.$ext;

                    
                $source_path = $_FILES['image']['tmp_name'];
                
                $destination_path = "../images/category/".$image_name;

                //finally upload the image 
                $upload = move_uploaded_file($source_path, $destination_path);

                //check whether the image is uploaded or not 
                //and if the image is not uploaded them we will stop the process and redirect with error message
                if($upload==false)
                {
                    //SET message
                    $_SESSION['upload'] = "<div class='error'>Failed to upload image.</div>";
                    //redirect to add category page 
                    header('location:'.SITEURL.'admin/manage-category.php');
                    //stop the process
                    die(); 

                }
                $remove_path= "../images/category/".$current_image;
                $remove = unlink($remove_path);
                if($remove==false)
                {
                    $_SESSION['failed-remove'] = "<div class='error'>Failed to remove current image</div>";
                    header('location:'.SITEURL.'admin/manage-category.php');
                    die();
                }
                    
                 }
                 else
                 {
                    $image_name = $current_image;
                 }

                }
            
            else
            {
                $image_name = $current_image;
            }
              $sql2 = "UPDATE table_category SET
                title = '$title',
                image_name='$image_name',
                featured = '$featured',
                active = '$active'
                WHERE id=$id
                ";
      //executed the query 
             $res2 = mysqli_query($conn, $sql2);

             if($res2==true)
            {
                //category updated
                $_SESSION['update'] = "Category Update Successfully.";
                header('location:'.SITEURL.'admin/manage-category.php');
            }
            else
            {
                //failed to update category
                $_SESSION['update'] = "<div class='error'>Failed to Update Category.</div>";
                header('location:'.SITEURL.'admin/manage-category.php');
            }
                    }
        ?>


    </div>
</div>
<?php include('partials/footer.php'); ?>



