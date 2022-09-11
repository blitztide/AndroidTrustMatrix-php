<?php
defined('matrix') or die('Not for public use');
$servername = '127.0.0.1';
$username = 'web';
$password = 'RvxTDk8q';
$database = 'hack';
$limit = 50;

$conn = new mysqli($servername, $username, $password,$database);

if ($conn->connect_error){
	die('Connection Failed: ' . $conn->connect_error);
}
?>
