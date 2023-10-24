<?php include('partials-front/menu.php')?>
    <!-- Ganpati Search Section Starts Here -->
    <section class="ganpati-search text-center">
        <div class="container">
            
            <?php 
                $search = mysqli_real_escape_string($conn, $_POST['search']);
                //it wiil remove unwanted thingsa and will keep only string
            ?>
            <h2 style="color: white;">Ganpati on Your Search <a href="#" class="text-white"><?php echo $search;?></a></h2>

        </div>
    </section>
    <!--  SEARCH Section Ends Here -->



    <!--Section Starts Here -->
    
    <!--  Section Starts Here -->
    <section class="ganpati-menu">
        <div class="container">
            <h2 class="text-center">Available Murtis</h2>

            <?php 
                
                $sql = "SELECT * FROM table_ganpati WHERE title LIKE '%$search%' OR description LIKE '%$search%'";

                $res = mysqli_query($conn , $sql);
                $count = mysqli_num_rows($res);
                if($count>0)
                {
                    while($row=mysqli_fetch_assoc($res))
                    {
                        $id= $row['id'];
                        $title = $row['title'];
                        $price = $row['price'];
                        $description = $row['description'];
                        $image_name = $row['image_name'];

                        ?>
                        <div class="ganpati-menu-box">
                            <div class="ganpati-menu-img">
                            <?php 
                                        if($image_name == "")
                                        {
                                            echo "<div class='error'>Image not Available</div>";
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

                                <a href="#" class="btn btn-primary">Book Now</a>
                            </div>
                        </div>
                        <?php
                    }
                }
                else
                {
                    echo "<div class='error'>Not Found</div>";
                }

            ?>

            <div class="clearfix"></div>
        </div>

    </section>
    <!-- fOOD Menu Section Ends Here -->
    <?php include('partials-front/footer.php')?>