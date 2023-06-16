<?php

//include tcher_search_and_view.php
include_once('../functions/tcher_search_and_view.php');

$result = Search_and_view($_GET['data']);

echo($result);
?>