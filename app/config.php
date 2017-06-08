<?php
include_once('User.php');
include_once('Relationship.php');
include_once('Relation.php');

// Mysql credentials and details
$host = 'localhost';
$username = 'root';
$password = '';
$db = 'db';

// Connect to mysql
$mysqli = new mysqli($host, $username, $password, $db);

// Check if there is any error in creating db connection.
if ($mysqli->connect_error) {
  die('Connect Error: Could not connect to database');
}