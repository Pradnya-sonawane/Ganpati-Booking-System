<?php include('partials/menu.php');?>
        <div class="main-content">
            <div class="wrapper">
                <h1>Manage Ganpati</h1>
                <br><br>
                <a href="<?php echo SITEURL;?>admin/add-ganpati.php" class="btn-primary"> Add Ganpati</a>
                <br><br><br>
                <?php

                if(isset($_SESSION['add']))
                {
                    echo $_SESSION['add'];
                    unset($_SESSION['add']);
                }
                if(isset($_SESSION['delete']))
                {
                    echo $_SESSION['delete'];
                    unset($_SESSION['delete']);
                }
                if(isset($_SESSION['upload']))
                {
                    echo $_SESSION['upload'];
                    unset($_SESSION['upload']);
                }
                if(isset($_SESSION['unauthorize']))
                {
                    echo $_SESSION['unauthorize'];
                    unset($_SESSION['unauthorize']);
                }
                if(isset($_SESSION['update']))
                {
                    echo $_SESSION['update'];
                    unset($_SESSION['update']);
                }
                ?>
                <br>
                <table class="tbl-full">
                    <tr>
                        <th>S.N</th>
                        <th>Title</th>
                        <th>Price</th>
                        <th>Image</th>
                        <th>Featured</th>
                        <th>Active</th>
                        <th>Actions</th>
                    </tr>

                    <?php
                        $sql = "SELECT * FROM table_ganpati";
                        $res=mysqli_query($conn, $sql);
                        if($res==True)
                        {
                            $count=mysqli_num_rows($res);
                            $sn=1;
                            if($count>0)
                            {
                                
                                while($rows=mysqli_fetch_assoc($res))
                                {
                                    $id=$rows['id'];
                                    $title=$rows['title'];
                                    $price=$rows['price'];
                                    $image_name=$rows['image_name']; 
                                    $featured=$rows['featured'];
                                    $active=$rows['active'];
                                 
                                    ?>
                                    
                                    <tr>
                                    <td><?php echo $sn++;?></td>
                                    <td><?php echo $title;?></td>
                                    <td><?php echo $price;?></td>
                                    <td><?php 
                                        if($image_name=="")
                                        {
                                            echo "<div class='error'>Image Not Added</div>";
                                        }
                                        else{
                                            ?>
                                                <img src="<?php echo SITEURL;?>images/ganpati/<?php echo $image_name;?>" width="100px">
                                            <?php

                                        }
                                    ?></td>
                                    <td><?php echo $featured;?></td>
                                    <td><?php echo $active;?></td>
                                    <td>    
                                    
                                    
                                    <a href="<?php echo SITEURL;?>admin/delete-ganpati.php?id=<?php echo $id;?>&image_name=<?php echo $image_name;?>" class="btn-danger">Delete Murti</a>
                                    </td>
                                    </tr>

                                 <?php

                                }
                            }
                            else{
                                echo "<tr> <td colspan='7' class='error'>Ganpati not added yet</td></tr>";
                            }
                        }
                    ?>

                    
                    
                </table>

               
            </div>
        </div>

<?php include('partials/footer.php'); ?>
