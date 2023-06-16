<?php

//include search_and_view.php (function page)
include_once('../functions/update_stu.php');

$result = viewSingleStu($_GET['id']);

echo($result);
?>