<?php include('../config/constants.php'); ?>

<html>
   <head>
       <title>login-ganpati booking system</title>
       <link rel="stylesheet" href="../css/admin.css?v=<?php echo time(); ?>">
       <link rel="stylesheet" href="../css/login.css?v=<?php echo time(); ?>">
   </head>
   <body>
       <div class="login">
        <h1 class="text-center">login</h1>
        <br><br>

        <?php
             if(isset($_SESSION['login']))
             {
                echo $_SESSION['login'];
                unset($_SESSION['login']);
             }

             if(isset($_SESSION['no-login-message']))
             {
                echo $_SESSION['no-login-message'];
                unset($_SESSION['no-login-message']);
             }
        ?> 
        <br><br>   

        <!-- login Form starts Here-->
        <form action=""method="POST" class="text-center">
         Username:<br>
         <input type="text" name="username" placeholder="Enter Username"><br><br>

         Password:<br>
        <input type="password" name="password" placeholder="Enter Password"><br><br>

        <input type="submit" name="submit" value="login" class="btn-primary">
        <br><br>


</form>
<!--login form Ends Here -->



        <p class="text-center">Created By-<a href="#">Pradnya And Team</a></p>
        </div>

</body>
</html>

<?php 
      
      //check whether the submit button is clicked or not 
      if( isset($_POST['submit']))
       {
          //process for login 
          //1.Get the Data fron login form


          //$username = $_POST['username'];
          //$password = md5($_POST['password']);
          $username = mysqli_real_escape_string($conn, $_POST['username']);
          $password = mysqli_real_escape_string($conn, md5($_POST['password']));
          //2.SQL to check whether the user with username and password exists or not
          $sql = "SELECT * FROM table_admin WHERE username='$username' AND password='$password'";

          //3.Execute the Query
          $res = mysqli_query($conn, $sql);

          //4.count rows to check whether the user exists or not 
          $count = mysqli_num_rows($res);

          if($count==1)
          {
              //user available and login succeess
              //$_SESSION['login'] = "login successful.";
              $_SESSION['user'] = $username; // to check whether the user is logged in or not and logout will unset it

              //redirect to home page/dashboard
              header('location:' .SITEURL.'admin/index.php');
          }
          else 
          {
            //user not available and login fail
            $_SESSION['login'] = "<div class='error text-center'>username or password did not match.</div>";
            //redirect to home page/dashboard
            header('location:' .SITEURL.'admin/login.php');
          }


       }


?>

