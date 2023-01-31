<?php
include_once 'header.php';
?>

     <main>
         <?php /*changing content if user is logged in or not*/
            if (isset($_SESSION["memberusername"])) {
               echo "<p>Hello there " . $_SESSION["memberusername"] . "</p>";
               echo "<h3>goodday " . "</h3>";
            }
         ?>

         <h1>Welcome to LilyTheWorld</h1>
         <p>A place were you can shop, talk and view all things kpop; designed by a fellow fan, for fellow fans.</p>
         <a href="https://sokollab.co.uk/collections/new-in-april-2019" target="_blank">Click Here To Shop Now</a>
     </main>

<?php
include_once 'footer.php';
?>