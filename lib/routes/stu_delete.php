<?php

//include delete page
include_once('../functions/stu_delete.php');

$result = stuDelete($_GET['stu_id']);

echo($result);
?>