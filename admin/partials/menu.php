<?php 
include('../config/constants.php');
include('login-check.php');
?>

<html>
    <head>
        <title>Ganpati Booking Website Home Page</title>
        <link rel="stylesheet" href="../css/admin.css?v=<?php echo time(); ?>">
    </head>
    <body>

        <div class="menu text-center">
            <div class="wrapper">
            <ul>
                    <li>
                        <a href="index.php">Home</a>
                    </li>
                    <li>
                        <a href="manage-admin.php">Admin</a>
                    </li>
                    <li>
                        <a href="manage-category.php">Category</a>
                    </li>
                    <li>
                        <a href="manage-ganpati.php">Ganpati</a>
                    </li>
                    <li>
                        <a href="manage-booking.php">Booking</a>
                    </li>
                    <li>
                        <a href="logout.php">Logout</a>
                    </li>
                </ul>
            </div>
        </div>
