<?php

//include update.php
include_once('../functions/update1.php');

$result = teaUpdate($_POST['editIDt'],$_POST['editNamet'],$_POST['editNICt'],$_POST['editPhonet'],$_POST['editEmailt']);

echo($result);
?>