<?php
    include_once 'header.php';
?>

<div>
    <form action="includes/signup-inc.php" method="post" class="signup-form">

        <h2>Sign Up</h2>

        <label for="title">Choose your title</label>
        <select>
            <option  name="title" selected disabled>Choose one option from the list below</option>
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

        <label for="surname">SurName</label>
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

        <button type="submit" name="signup-submit">sign up</button>

    </form>
</div>

<?php
    include_once 'footer.php';
?>