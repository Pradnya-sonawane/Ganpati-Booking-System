<?php include('partials/menu.php');?>
        <div class="main-content">
            <div class="wrapper">
                <h1>Manage Booking</h1>
                <br>

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
                if(isset($_SESSION['update']))
                {
                    echo $_SESSION['update'];
                    unset($_SESSION['update']);
                }
                if(isset($_SESSION['user-not-found']))
                {
                    echo $_SESSION['user-not-found'];
                    unset($_SESSION['user-not-found']);
                }
                if(isset($_SESSION['pwd-not-found']))
                {
                    echo $_SESSION['pwd-not-found'];
                    unset($_SESSION['pwd-not-found']);
                }
                if(isset($_SESSION['change-pwd']))
                {
                    echo $_SESSION['change-pwd'];
                    unset($_SESSION['change-pwd']);
                }
                ?>
                <br><br>

                <br>
                <br>
                <table class="tbl-full">
                    <tr>
                        <th>S.N</th>
                        <th>Ganpati Name</th>
                        <th>Price</th>
                        <th>Quantity</th>
                        <th>Total</th>
                        <th>Order Date</th>
                        <th>Status</th>
                        <th>Customer Name</th>
                        <th>Customer Contact</th>
                        <th>Email</th>
                        <th>Address</th>
                        <th>Actions</th>
                        
                    </tr>

                    <?php
                        $sql = "SELECT * FROM table_order ORDER BY id DESC";
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
                                    $ganpati=$rows['ganpati'];
                                    $price=$rows['price'];
                                    $qty = $rows['qty'];  
                                    $total = $rows['total'];
                                    $order_date= $rows['order_date'];
                                    $status = $rows['status'];
                                    $customer_name = $rows['customer_name'];
                                    $customer_contact = $rows['customer_contact'];
                                    $customer_email = $rows['customer_email'];
                                    $customer_address = $rows['customer_address'];
                                    
                                    ?>
                                    <tr>
                                    <td><?php echo $sn++;?></td>
                                    <td><?php echo $ganpati;?></td>
                                    <td><?php echo $price;?></td>
                                    <td><?php echo $qty;?></td>
                                    <td><?php echo $total;?></td>
                                    <td><?php echo $order_date;?></td>
                                    <td><?php echo $status;?></td>
                                    <td><?php echo $customer_name;?></td>
                                    <td><?php echo $customer_contact;?></td>
                                    <td><?php echo $customer_email;?></td>
                                    <td><?php echo $customer_address;?></td>
                                    <td>
                                    <a href="<?php echo SITEURL;?>admin/update-booking.php?id=<?php echo $id;?>" class="btn-danger">Update Booking</a>
                                    </td>
                                    </tr>

                                 <?php

                                }
                            }
                            else{
                                    echo "<tr><td colspan = '12' class='error'>Orders not Available</td></tr>";
                            }
                        }
                    ?>

                    
                    
                </table>
            </div>
        </div>

<?php include('partials/footer.php'); ?>
