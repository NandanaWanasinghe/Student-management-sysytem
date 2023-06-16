<?php

//include delete page
include_once('../functions/tcher_delete.php');

$result = tchrDelete($_GET['tea_id']);

echo($result);
?>