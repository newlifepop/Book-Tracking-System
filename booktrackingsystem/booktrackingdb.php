<?php
/* Database connection settings */
$host = 'localhost';
$user = 'root';
$pass = 'cs425';
$db = 'booktracking';
$mysqli = new mysqli($host, $user, $pass, $db) or die($mysqli->error);