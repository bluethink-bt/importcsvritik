<?php
class user
{
    private $name;
    private $email;
    private $mobile;
    private $password;

    function login($userName, $pass) // login existing user
    {
        require 'dbconnect.php';
        $sql = " SELECT * FROM `register` WHERE `name`='$userName'";
        $result = mysqli_query($conn, $sql);
        $row = mysqli_num_rows($result);

        if ($row == 1) {
            while ($row = mysqli_fetch_assoc($result)) {
                if ($pass == password_verify($pass, $row['password'])) {

                    session_start();
                    $_SESSION['user_name'] = $userName;
                    $_SESSION['login'] = true;
                    header('location:../htmlpage/userpanel.php');
                    die;
                } else {
                    header('location:../indexd.php?passwordWrong');
                    die;
                }
            }
        } else {

            header('location:../indexd.php?userNotFound');
            die;
        }
    }

    function isUserExist($userName) // check user exist or not
    {

        require 'dbconnect.php';
        $sql = " SELECT * FROM `register` WHERE `name`='$userName'";
        $result = mysqli_query($conn, $sql);
        $row = mysqli_num_rows($result);
        if ($row > 0) {
            return true;
        } else {
            return false;
        }
    }

    function register($name, $email, $phone, $password) // register a new user
    {

        $this->name = htmlspecialchars($name);
        $this->email = htmlspecialchars($email);
        $this->mobile = htmlspecialchars($phone);
        $this->password = htmlspecialchars($password);

        include 'dbconnect.php';
        $sql = "INSERT INTO `register`(`name`, `email`, `mobile`, `password`) VALUES ('$this->name','$this->email','$this->mobile','$this->password')";

        $result = mysqli_query($conn, $sql);

        if ($result) {

            session_start(); //start session
            $_SESSION['user_name'] = $name;
            $_SESSION['login'] = true;
            header('location:../htmlpage/userpanel.php');
            die;
        } else {
            echo 'There is a problem to inserting data...';
        }
    }
}
