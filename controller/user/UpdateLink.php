<?php

namespace controller\user;

use db\UserDb;
use Exception;

session_start();

if (isset($_POST['facebook'])) {
    try {
        $email = $_SESSION['userEmail'];
        $link = 'facebook';
        $value = $_POST['facebook'];
        UserDb::updateLink($email, $link, $value);
        $_SESSION['facebook'] = $value;
        header("location: ./settings");
    } catch (Exception $e) {
        throw $e;
    }
} else if (isset($_POST['instagram'])) {
    try {
        $email = $_SESSION['userEmail'];
        $link = 'instagram';
        $value = $_POST['instagram'];
        UserDb::updateLink($email, $link, $value);
        $_SESSION['instagram'] = $value;
        header("location: ./settings");
    } catch (Exception $e) {
        throw $e;
    }
} else if (isset($_POST['website'])) {
    try {
        $email = $_SESSION['userEmail'];
        $link = 'website';
        $value = $_POST['website'];
        UserDb::updateLink($email, $link, $value);
        $_SESSION['website'] = $value;
        header("location: ./settings");
    } catch (Exception $e) {
        throw $e;
    }
}
