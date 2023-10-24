<?php include('partials-front/menu.php')?>

<?php 
    if(isset($_GET['ganpati_id']))
    {
        $ganpati_id = $_GET['ganpati_id'];
        $sql = "SELECT * FROM table_ganpati WHERE id=$ganpati_id";
        $res = mysqli_query($conn , $sql);
        $count = mysqli_num_rows($res);
        if($count==1)
        {
            $row = mysqli_fetch_assoc($res);
            $title = $row['title'];
            $price = $row['price'];
            $image_name= $row['image_name'];
        }
        else{
            header('location:'.SITEURL);
        }

    }
    else
    {
        header('location:'.SITEURL);
    }
?>
    <!-- Section Starts Here -->
    <section class="ganpati-search">
        <div class="container">
            
            <h2 class="text-center text-white for-heading">Fill this form to confirm your Booking.</h2>

            <form action="" method="POST" class="order">
                <fieldset>
                    <legend>Selected Ganpati</legend>

                    <div class="ganpati-menu-img">

                        <?php 
                            if($image_name=="")
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
                        <h3><?php echo $title;?></h3>
                        <input type="hidden" name="ganpati" value ="<?php echo $title;?>">
                        <p class="ganpati-price"><?php echo $price;?></p>
                        <input type="hidden" name="price" value ="<?php echo $price;?>">

                        <div class="order-label">Quantity</div>
                        <input type="number" name="qty" class="input-responsive" value="1" required>
                        
                    </div>

                </fieldset>
                
                <fieldset >
                    <legend>Booking Details</legend>
                    <div class="order-label">Full Name</div>
                    <input type="text" name="full-name" placeholder="E.g. usernames" class="input-responsive" required>

                    <div class="order-label">Phone Number</div>
                    <input type="tel" name="contact" placeholder="E.g. 9843xxxxxx" class="input-responsive" required>

                    <div class="order-label">Email</div>
                    <input type="email" name="email" placeholder="E.g. abc@gmail.com" class="input-responsive" required>

                    <div class="order-label">Address</div>
                    <textarea name="address" rows="10" placeholder="E.g. Street, City, Country" class="input-responsive" required></textarea>
                    <div id="submit-container">
                        <input type="submit" name="submit" value="Confirm Booking" class="btn submit-btn-primary button-center">
                    </div>
                </fieldset>

            </form>

            <?php 
                //to check whether submit button is clicked
                if(isset($_POST['submit']))
                {
                    $ganpati = $_POST['ganpati'];
                    $price = $_POST['price'];
                    $qty = $_POST['qty'];
                    $total = $price * $qty;
                    $order_date = date("Y-m-d H:i:s");
                    $status = "Booked";
                    $customer_name = $_POST['full-name'];
                    $customer_contact = $_POST['contact'];
                    $customer_email = $_POST['email'];
                    $customer_address = $_POST['address'];

                    $sql2 = "INSERT INTO table_order SET
                     ganpati = '$ganpati',
                     price= $price,
                     qty = $qty,
                     total = $total,
                     order_date = '$order_date',
                     status = '$status',
                     customer_name = '$customer_name',
                     customer_contact = '$customer_contact',
                     customer_email  = '$customer_email',
                     customer_address = '$customer_address'
                    ";

                    $res2 = mysqli_query($conn , $sql2);

                    if($res2 == true)
                    {
                        $_SESSION['order'] = "<div class='success text-center'>Ganpati Booked Successfully</div>";
                        header('location:'.SITEURL);
                    }
                    else
                    {
                        $_SESSION['order'] = "<div class='error text-center'>Failed to Book</div>";
                        header('location:'.SITEURL);
                    }

                }
                else{

                }
            ?>

        </div>
    </section>
    <!-- SEARCH Section Ends Here -->
    <?php include('partials-front/footer.php')?>