<?php 

include_once("app/init.php");

// remove session
unset($_SESSION['fb_token']);

// redirect to index
header("Location: index.php");