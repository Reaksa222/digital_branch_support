<?php

$db_host = 'localhost';
$db_username = 'root';
$db_password = '';
$db_name = 'chatbotv2';

session_start();
session_unset();
session_destroy();

header('location:login.php');

?>