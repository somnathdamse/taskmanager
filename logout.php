<?php
session_start();
// unset($_SESSION["id"]);
// unset();
session_destroy();
header("Location:index.php");
?>