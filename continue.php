<?php
/**
 * Created by PhpStorm.
 * @author Zachary Hughes <zhughes3@gmail.com>
 * Date: 3/16/2016
 * Time: 1:19 PM
 * Description:
 */

session_start();

if (isset($_SESSION['username'])) {
    $username = $_SESSION['username'];
    $password = $_SESSION['password'];
    $firstname = $_SESSION['firstname'];
    $lastname = $_SESSION['lastname'];

    echo "Welcome back $firstname.<br>
      Your full name is $firstname $lastname.<br>
      Your username is '$username'
      and your password is '$password'.";
} else {
    echo "Please <a href = 'authenticate.php'> click here</a> to log in.";
}