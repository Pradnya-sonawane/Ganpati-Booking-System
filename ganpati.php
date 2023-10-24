<?php include('partials-front/menu.php')?>
    <!-- SEARCH Section Starts Here -->
    <section class="ganpati-search text-center">
        <div class="container">
            
            <form action="<?php echo SITEURL;?>ganpati-search.php" method="POST">
                <input type="search" name="search" placeholder="Search for Ganpati.." required>
                <input type="submit" name="submit" value="Search" class="btn btn-primary">
            </form>

        </div>
    </section>
    <!-- SEARCH Section Ends Here -->



    <!--Section Starts Here -->
    
    <section class="ganpati-menu">
        <div class="container">
            <h2 class="text-center">Available Murtis</h2>

            <?php 
                $sql = "SELECT * FROM table_ganpati WHERE active='Yes'";
                $res = mysqli_query($conn , $sql);
                $count = mysqli_num_rows($res);
                if($count>0)
                {
                    while($row=mysqli_fetch_array($res))
                    {
                    $id= $row['id'];
                    $title = $row['title'];
                    $description = $row['description'];
                    $price = $row['price'];
                    $image_name = $row['image_name'];
                    ?>
                        <div class="ganpati-menu-box">
                            <div class="ganpati-menu-img">
                            <?php 
                                    if($image_name == "")
                                    {
                                            echo "<div class = 'error'>Image not Found.</div>";    
                                    }
                                    else{
                                        ?>
                                        <img src="<?php echo SITEURL;?>images/ganpati/<?php echo $image_name;?>" alt="Ganpati" class="img-responsive img-curve-ganpati">
                                        <?php
                                    }
                                ?>
                                
                            </div>

                            <div class="ganpati-menu-desc">
                                <h4><?php echo $title;?></h4>
                                <p class="ganpati-price"><?php echo $price;?></p>
                                <p class="ganpati-detail">
                                    <?php echo $description;?>
                                </p>
                                <br>

                                <a href="<?php echo SITEURL;?>order.php?ganpati_id=<?php echo $id;?>" class="btn btn-primary">Book Now</a>
                            </div>
                        </div>
                    
                    <?php
                }
            }
                else{
                    echo "<div class='error'>Ganpati not Found</div>";
                }
            ?>

            


            <div class="clearfix"></div>

            

        </div>

    </section>
    <!-- Section Ends Here -->
    <?php include('partials-front/footer.php')?>