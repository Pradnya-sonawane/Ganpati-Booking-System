<?php include('partials/menu.php');?>

<div class="main-content">
    <div class="wrapper">
        <h1>Update Booking</h1>
        <br><br>

        <?php 
            if(isset($_GET['id']))
            {
                $id = $_GET['id'];

                $sql = "SELECT * FROM table_order WHERE id=$id";
                $res = mysqli_query($conn , $sql);
                $count = mysqli_num_rows($res);
                if($count==1)
                {
                    $row= mysqli_fetch_assoc($res);

                    $ganpati = $row['ganpati'];
                    $price = $row['price'];
                    $qty = $row['qty'];
                    $status = $row['status'];
                    $customer_name = $row['customer_name'];
                    $customer_contact = $row['customer_contact'];
                  


                }
                else{
                    header('location:'.SITEURL.'admin/manage-booking.php');
            
            }
        }
            else{
                header('location:'.SITEURL.'admin/manage-booking.php');
            }
        ?>

        <form action="" method="POST">
            <table class="tbl-30">
                <tr>
                    <td>Ganpati Name: </td>
                    <td><b><?php echo $ganpati;?></b></td>
                </tr>
                <tr>
                    <td>Quantity: </td>
                    <td><input type="number" name="qty" value="<?php echo $qty;?>"></td>
                </tr>
                <tr>
                    <td>Status: </td>
                    <td>
                        <select name="status">
                            <option <?php if($status == "Booked") {echo "Selected";}?> value="Booked">Booked</option>
                            <option <?php if($status == "Cancelled") {echo "Selected";}?>value="Cancelled">Cancelled</option>
                            <option <?php if($status == "Delivered") {echo "Selected";}?>value="Delivered">Delivered</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>Customer Name: </td>
                    <td><b><?php echo $customer_name;?></b></td>
                </tr>
                <tr>
                    <td>Customer Contact: </td>
                    <td><b><?php echo $customer_contact;?></b></td>
                </tr>
                
                <tr>
                    <td colspan="2">
                    <input type="hidden" name="id" value="<?php echo $id;?>">
                    <input type="hidden" name="price" value="<?php echo $price;?>">
                    <input type="submit" name="submit" value="Update Booking" class="btn-secondary">
                    </td>
                </tr>
            </table>

        </form>
    </div>
</div>

<?php 
    if(isset($_POST['submit']))
    {
        $id = $_POST['id'];
        //$ganpati = $_POST['ganpati'];
        $price = $_POST['price'];
        $qty = $_POST['qty'];
        $total = $price * $qty;
        $status = $_POST['status'];
        //$customer_name = $_POST['customer_name'];
        //$customer_contact = $_POST['customer_contact'];

        $sql = "UPDATE table_order SET 
        price=$price,
        qty=$qty,
        total = $total,
        status = '$status'
        WHERE id=$id
        ";

        $res = mysqli_query($conn,$sql);
        if($res==true)
        {
            $_SESSION['update'] = "Booking Updated Successfully";
            header('location:'.SITEURL.'admin/manage-booking.php');
        }
        else
        {
            $_SESSION['update'] = "Failed to Update Booking";
            header('location:'.SITEURL.'admin/manage-booking.php');
        }
    }
?>

<?php include('partials/footer.php');?>