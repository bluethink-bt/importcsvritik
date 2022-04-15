<?php

//register new user

require 'userClass.php';
$name = $_POST['name'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$password = password_hash($_POST['password'], PASSWORD_DEFAULT);

$insertData = new user();
if (!$insertData->isUserExist($name)) {
    $insertData->register($name, $email, $phone, $password);
} else {
    header('location:../indexd.php?userAlreadyExist');
}
