<?php
print "Hello";
$message = $_POST['message'];
$created = $_POST['created_at'];
print_r($_POST);

// Downcase it
$message = strtolower($message);
// Removing non-alphanumeric characters
$message = preg_replace("/[^a-zA-Z0-9\s]/", '', $message);
// Replacing consecutive spaces with a single space
$message = preg_replace("/\s+/", ' ', $message);
// Removing leading and trailing whitespace
$message = trim($message);

$db = mysql_connect('localhost', 'testuser', 'testpassword') or die("Could not connect: " . mysql_error());
mysql_select_db('technical_test', $db);
$sql = mysql_query("CREATE TABLE test (message VARCHAR(255), created VARCHAR(255))");
$result = mysql_query("INSERT INTO `test` VALUES ('$message', '$created')");
