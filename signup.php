<?php
    include_once 'header.php';
?>

<div>

<?php /*put at top so that error msg is at top*/
    if(isset($_GET["error"])){ /*$_GET=checking for data in url we can see*/
        if($_GET["error"] == "emptyinput"){
            echo "<p>Fill in all fields!</p>";
        }
        else if($_GET["error"] == "invalidusername"){
            echo "<p>Choose a proper username, no symbols!</p>";
        }
        else if($_GET["error"] == "invalidemail"){
            echo "<p>Choose a proper,standard email!</p>";
        }
        else if($_GET["error"] == "passwordsnomatch"){
            echo "<p>Passwords don't't match!</p>";
        }
        else if($_GET["error"] == "stmtfailed"){
            echo "<p>Something went wrong, so try again!</p>";
        }
        else if($_GET["error"] == "usernametaken"){
            echo "<p>Username already taken! Give another username!</p>";
        }
        else if($_GET["error"] == "none"){
            echo "<p>You have signed up successfully!</p>";
        }
    }
?>
    <form action="includes/signup-inc.php" method="post" class="signup-form">

        <h2>Sign Up</h2>

        <label for="title">Choose your title from the list below</label>
        <select id="title" name="title">
            <option value="mrs">Mrs</option>
            <option value="mr">Mr</option>
            <option value="miss">Miss</option>
            <option value="ms">Ms</option>
            <option value="sir">Sir</option>
            <option value="dr">Dr</option>
            <option value="prof">Professor</option>
        </select>

        <label for="firstname">First Name</label>
        <input type="text" id="firstname" name="firstname" placeholder="Enter your first name here...">

        <label for="surname">Surname</label>
        <input type="text" id="surname" name="surname" placeholder="Enter your surname here...">

        <label for="streetname">Street Name</label>
        <input type="text" id="streetname" name="streetname" placeholder="Enter street name here...">

        <label for="cityname">City Name</label>
        <input type="text" id="cityname" name="cityname" placeholder="Enter city name here...">

        <label for="doornum">Door Number</label>
        <input type="text" id="doornum" name="doornum" placeholder="Enter your door number here...">

        <label for="postcode">Postcode</label>
        <input type="text" id="postcode" name="postcode" placeholder="Enter postcode here...">

        <label for="email">Email</label>
        <input type="email" id="email" name="email" placeholder="Enter your email here...">

        <label for="username">Username</label>
        <input type="text" id="username" name="username" placeholder="Enter your username here...">

        <label for="password">Password</label>
        <input type="password" id="password" name="pwd" placeholder="Enter your Password here...">

        <label for="repeatpassword">Repeat Password</label>
        <input type="password" id="repeatpassword" name="pwdrepeat" placeholder="Repeat password here...">

        <button class="btnsignup" role="button" type="submit" name="signup-submit">sign up</button>
        <link rel="stylesheet" href="buttons_1.css">
    </form>
</div>

<?php
    include_once 'footer.php';
?>