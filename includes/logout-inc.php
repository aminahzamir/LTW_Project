<?php
session_start(); /*destroying sessions*/
session_unset();
session_destroy();

header("location: ../index.php");
exit();