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
<br><br>
    <?php 
        if(isset($_SESSION['order']))
        {
            echo $_SESSION['order'];
            unset($_SESSION['order']);
        }

    ?>

    <!-- Categories Section Starts Here -->
    <!--SITEURL holds base url of website-->
    <section class="categories">
        <div class="container">
            <h2 class="text-center">Ganpati Booking</h2>

            <?php 
                $sql = "SELECT * FROM table_category WHERE active='Yes' AND featured = 'Yes' LIMIT 3";
                $res = mysqli_query($conn, $sql);
                $count = mysqli_num_rows($res);
                if($count>0)
                {
                    while($row = mysqli_fetch_assoc($res))
                    {
                        $id = $row['id'];
                        $title = $row['title'];
                        $image_name = $row['image_name'];
                        ?>
                            <a href="<?php echo SITEURL;?>category-ganpati.php?category_id=<?php echo $id;?>"> 
                                <div class="box-3 float-container">
                                    <?php 
                                        if($image_name == "")
                                        {
                                            echo "<div class='error'>Image not Available</div>";
                                        }
                                        else{
                                            ?>
                                            <img src="<?php echo SITEURL;?>images/category/<?php echo $image_name;?>" alt="Ganpati" class="img-responsive img-curve">
                                            <?php
                                        }
                                    ?>
                                    
                                    <h3 class="float-text text-white"><?php echo $title;?></h3>
                                </div>
                                </a>
                        <?php
                    }
                }
                else{
                    echo "<div class='error'>Category not Added</div>";
                }

            ?>
            <div class="clearfix"></div>
        </div>
    </section>
    <!-- Categories Section Ends Here -->

    <!-- Section Starts Here -->
    <section class="ganpati-menu">
        <div class="container">
            <h2 class="text-center">Available Murtis</h2>

            <?php 
                $sql2 = "SELECT * FROM table_ganpati WHERE active = 'Yes' AND featured = 'Yes' LIMIT 6";
                $res2 = mysqli_query($conn , $sql2);
                $count2 = mysqli_num_rows($res2);
                if($count2 > 0)
                {
                    while($row2 = mysqli_fetch_assoc($res2))
                    {
                        $id = $row2['id'];
                        $title = $row2['title'];
                        $price = $row2['price'];
                        $description = $row2['description'];
                        $image_name = $row2['image_name'];  
                        
                        ?>
                            <div class="ganpati-menu-box">
                                <div class="ganpati-menu-img">
                                    <?php 
                                        if($image_name== "")
                                        {
                                            echo "<div class='error'>Image not Available</div>";
                                        }
                                        else{
                                            ?>
                                            <img src="<?php echo SITEURL;?>images/ganpati/<?php echo $image_name;?>" alt="ganpati" class="img-responsive img-curve-ganpati">
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
                    echo "<div class='error'>Ganpati not Available</div>";
                }
            ?>

            <div class="clearfix"></div>
        </div>

        <p class="text-center">
            <a href="#">See All Ganpati</a>
        </p>
    </section>
    <!-- Section Ends Here -->
    <?php include('partials-front/footer.php')?>