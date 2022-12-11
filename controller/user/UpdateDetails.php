<?php

namespace controller\user;

use db\UserDb;
use Exception;

session_start();

try {
    if (isset($_POST['mobile'])) {
        $email = $_SESSION['userEmail'];
        $link = 'mobile';
        $value = $_POST['mobile'];
        UserDb::updateDetails($email, $link, $value);
        $_SESSION['mobile'] = $value;
        header("location: ./settings");
    } else if (isset($_POST['job'])) {
        $email = $_SESSION['userEmail'];
        $link = 'job';
        $value = $_POST['job'];
        UserDb::updateDetails($email, $link, $value);
        $_SESSION['job'] = $value;
        header("location: ./settings");
    } else if (isset($_POST['address'])) {
        $email = $_SESSION['userEmail'];
        $link = 'address';
        $value = $_POST['address'];
        UserDb::updateDetails($email, $link, $value);
        $_SESSION['address'] = $value;
        header("location: ./settings");
    } else if (isset($_POST['fullname'])) {
        $email = $_SESSION['userEmail'];
        $link = 'fullname';
        $value = $_POST['fullname'];
        UserDb::updateDetails($email, $link, $value);
        $_SESSION['fullname'] = $value;
        header("location: ./settings");
    }
} catch (Exception $e) {
    throw $e;
}
