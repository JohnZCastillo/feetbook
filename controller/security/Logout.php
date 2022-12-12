<?php


namespace controller\security;

use db\HistoryDb;

session_start();

if (isset($_SESSION['isLogin'])) {

    if ($_SESSION['isLogin'] === true) {

        $sessionId = session_id();
        $timestamp = date('Y-m-d H:i:s', time());
        $email = $_SESSION['userEmail'];
        $id = $_SESSION['historyId'];

        HistoryDb::logout($id, $timestamp);

        session_destroy();

        header('Location: ./login');

        die();
    }
}

$_SESSION['loginError'] = "You're not login!";

header('Location: ./login');
