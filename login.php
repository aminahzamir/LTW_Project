<?php
    include_once 'header.php';
?>

<div>
<h2>Log in</h2>
    <form action="includes/login-inc.php" method="post"> 

        <label for="fname">First Name</label>
        <input type="text" id="name" name="name" placeholder="Enter your username or email here...">

        <label for="password">Password</label>
        <input type="password" id="password" name="password" placeholder="Enter your Password here...">

        <button class="btn" type="submit" name="submit">Log in</button>

    </form>
</div>

<?php
    include_once 'footer.php';
?>