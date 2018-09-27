<?php
include('config-and-functions.php');
include ('header.php');

if(empty($_REQUEST['subtopic'])) {
    $_REQUEST['subtopic'] = "home";
}
switch($_REQUEST['subtopic']) {
    case "home":
        include ('pages/home.php');
    break;
}

include ('footer.php');
?>