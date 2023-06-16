<?php

//include search_and_view.php (function page)
include_once('../functions/update.php');

$result = stuUpdate($_POST['editID'],$_POST['editName'],$_POST['editNIC'],$_POST['editPhone'],$_POST['editEmail']);

echo($result);
?>