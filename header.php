<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LTW-HOME</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Dosis:wght@700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style_LTW.css">
</head>

<body>
    <div class="container">
        <header>
            <img src="images/logo_1-LTW.jpeg" alt="LilyTheWorld Logo" srcset=""> 
        </header>
    </div>

     <nav>
        <a href='index.php'>HOME</a>
        <a href='products.php'>PRODUCTS</a>
        <a href='discover.php'>ABOUT US</a>
        <?php /*changing content if user is logged in or not*/
            if (isset($_SESSION["memberusername"])) {
                echo "<a href='orderHistory.php'>ORDER HISTORY</a>";
                echo "<a href='cart.php'>🛒</a>";
                echo "<a href='includes/logout-inc.php'>LOG OUT</a>";
            }
            else {
                echo "<a href='login.php'>LOGIN</a>";
                echo "<a href='signup.php'>SIGN UP</a>";
            }
        ?>
     </nav>
     