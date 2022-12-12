<?php

namespace controller\user;

session_start();

use db\UserDb;
use Exception;

require_once 'autoload.php';

try {

    // throw an error if image is missing
    if (!isset($_FILES['image'])) {
        throw new Exception("Missing Image");
    }

    // throw an error if user is not login
    if (!isset($_SESSION['userEmail'])) {
        throw new Exception('user email not found');
    }

    // path where images will ba saved
    $imagePath = './assets/profile/';

    $extension = pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION);
    $imageName = $_SESSION['userEmail'] . '.' . $extension;

    move_uploaded_file($_FILES['image']['tmp_name'], $imagePath . $imageName);

    $id =  $_SESSION['userEmail'];
    // update user profile in db 

    //updat user profile in db
    UserDb::updateUserProfile($id, $imageName);

    //udpate session profile
    $_SESSION['userProfile'] = $imageName;

    header("location: ./settings");
} catch (Exception $e) {
    http_response_code(403);
    $_SESSION['profileError'] = $e->getMessage();
    header("location: ./settings");
}
