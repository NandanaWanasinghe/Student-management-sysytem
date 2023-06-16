<?php

//include search_and_view.php (function page)
include_once('../functions/update_tea.php');

$result = viewSingleTea($_GET['id']);

echo($result);
?>