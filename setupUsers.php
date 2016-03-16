<?php
/**
 * Created by PhpStorm.
 * @author Zachary Hughes <zhughes3@gmail.com>
 * Date: 3/16/2016
 * Time: 10:55 AM
 * Description: Practicing storing usernames and passwords (using hashing and salting for security).
 */
require_once 'login.php';

$connection;

function addUser($conn, $fn, $ln, $un, $pw) {
    global $iniSalt, $endSalt;
    $iniSalt = "xb&z*";
    $endSalt = "nb!@";
    $token = hash('ripemd128', "$iniSalt$pw$endSalt");
    $query = "INSERT INTO users VALUES('$fn', '$ln', '$un', '$token')";
    $result = $conn->query($query);
    if (!$result) {
        die($conn->error);
    } else {
        echo "Row added to table users " .
            "firstname = '$fn' " .
            "lastname = '$ln' " .
            "username = '$un'<br>";
    }
}

$connection = new mysqli($db_host, $user, $pass, $db);

if ($connection->connect_error) {
    die($connection->connect_error);
}

$query = "CREATE TABLE IF NOT EXISTS users (
  firstname VARCHAR(32) NOT NULL,
  lastname VARCHAR(32) NOT NULL,
  username VARCHAR(32) NOT NULL UNIQUE,
  password VARCHAR(256) NOT NULL
)";

$result = $connection->query($query);
if (!$result) {
    die($connection->error);
}

addUser($connection, 'Bill', 'Murray', 'bmurray', 'mysecret');
addUser($connection, 'Sarah', 'Robertson', 'srob', 'virgin3');

?>