<?php
// log out
if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    $res = (int)$_GET['t'];
    if ($res) {
        session_start();
        session_unset();
        session_destroy();
        header("location:../indexd.php");
    }
}
