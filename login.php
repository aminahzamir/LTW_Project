<?php
    include_once 'header.php';
?>

<div>

<?php /*put at top so that error msg is at top*/
    if(isset($_GET["error"])){ /*$_GET=checking for data in url we can see*/
        if($_GET["error"] == "emptyinput"){
            echo "<p>Fill in all fields!</p>";
        }
        else if($_GET["error"] == "wronglogininfo"){
            echo "<p>Incorrect login information, try again!</p>";
        }
    }
?>

<h2>Log in</h2>

    <form action="includes/login-inc.php" method="post"> 

        <label for="username">Username</label>
        <input type="text" id="username" name="username" placeholder="Enter your username here...">

        <label for="password">Password</label>
        <input type="password" id="password" name="password" placeholder="Enter your Password here...">
        <button class="btnlogin" role="button" type="submit" name="login-submit">Log in</button>
        <link rel="stylesheet" href="buttons.css">
    </form>
</div>

<?php
    include_once 'footer.php';
?>