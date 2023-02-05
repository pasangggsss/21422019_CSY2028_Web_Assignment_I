<?php
session_start();
require '../database.php';
require '../autoload.php';
require '../Framework/RoutesList.php';

// Main functoin of the App;
$entryPosint = new \Framework\Main();