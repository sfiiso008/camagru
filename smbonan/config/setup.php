<?php
require_once ('database.php');
try
{
    $conn = new PDO("mysql:host=$DB_HOST", $DB_USER, $DB_PASSWORD);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $conn->exec("DROP DATABASE IF EXISTS `camagru`");
    $sql = "CREATE DATABASE IF NOT EXISTS `camagru`";
    $conn->exec($sql);
    echo "Database successfully created\n";
}
catch (PDOException $e)
{

    echo "ERROR CREATING DATABASE: ".$e->getMessage()."\nAborting process\n";
    exit;
}
try{
    $conn = new PDO($DB_DSN, $DB_USER, $DB_PASSWORD);
    $conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
    $sql = "CREATE TABLE `users` (
                        user_id INT(6) PRIMARY KEY AUTO_INCREMENT NOT NULL,
						login VARCHAR(40) UNIQUE NOT NULL,
						password VARCHAR(255) NOT NULL,
						email VARCHAR(128) UNIQUE NOT NULL,
						confirm_hash VARCHAR(255) NOT NULL)";
    $conn->exec($sql);
    echo "Table Users created successfully\n";
}
catch(PDOException $e)
{
    echo "ERROR CREATING TABLE: ".$e->getMessage()."\nAborting process\n";
    exit;
}
try {
    $dbh = new PDO($DB_DSN, $DB_USER, $DB_PASSWORD);
    $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = "CREATE TABLE `images` (
                  img_id INT(6) PRIMARY KEY AUTO_INCREMENT NOT NULL,
						link TEXT NOT NULL,
						pub_date DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
						author_id INT(6) NOT NULL,
						nb_likes INT(6) NOT NULL DEFAULT 0)";
    $dbh->exec($sql);
    echo "Table gallery created successfully\n";
}
catch (PDOException $e) {
    echo "ERROR CREATING TABLE: ".$e->getMessage()."\nAborting process\n";
}

try {
    $dbh = new PDO($DB_DSN, $DB_USER, $DB_PASSWORD);
    $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = "CREATE TABLE `likes` (
              like_id INT(6) PRIMARY KEY AUTO_INCREMENT NOT NULL,
						img_id INT(6) NOT NULL,
						author_id INT(6) NOT NULL)";
    $dbh->exec($sql);
    echo "Table like created successfully\n";
} catch (PDOException $e) {
    echo "ERROR CREATING TABLE: ".$e->getMessage()."\nAborting process\n";
}

try {
    $dbh = new PDO($DB_DSN, $DB_USER, $DB_PASSWORD);
    $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = "CREATE TABLE `comments` (
              com_id INT(6) PRIMARY KEY AUTO_INCREMENT NOT NULL,
						img_id INT(6) NOT NULL,
						author_id INT(6) NOT NULL,
						content MEDIUMTEXT NOT NULL
            )";
    $dbh->exec($sql);
    echo "Table comment created successfully\n";
} catch (PDOException $e) {
    echo "ERROR CREATING TABLE: ".$e->getMessage()."\nAborting process\n";
}
?>