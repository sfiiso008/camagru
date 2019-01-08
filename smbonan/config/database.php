<?php

$DB_DSN = "mysql:host=localhost;dbname=camagru";
$DB_USER ="root";
$DB_PASSWORD = "Mb0nan3sj008";
$DB_HOST = "localhost";
$DB_NAME = "camagru";

try {
	$db = new PDO($DB_DSN, $DB_USER, $DB_PASSWORD);
	$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	$db->query("CREATE DATABASE IF NOT EXISTS camagru CHARACTER SET utf8;
						USE camagru");
}
catch (PDOException $e) {
	echo "Database connection failed: " . $e->getMessage() . PHP_EOL;
	die();
}

?>
