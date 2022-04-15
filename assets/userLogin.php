<?php
//login user
require 'userClass.php';
$userlogin= new user();
$userlogin -> login(htmlspecialchars($_POST['uname']), htmlspecialchars($_POST['pass']));

