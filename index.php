<?php

// Act as a router.
// all incoming request will be sent to this file.

$request = $_SERVER['REQUEST_URI'];

require_once './autoload.php';

date_default_timezone_set("Asia/Manila");

// folder inside htdocs.
// check htaccess.
$base = '/feetbook/';

// reroute request to views.
switch ($request) {
    case $base:
        require __DIR__ . '/views/home.php';
        break;
    case $base . 'settings':
        require __DIR__ . '/views/user/settings.php';
        break;
    case $base . 'profile':
        require __DIR__ . '/views/user/profile.php';
        break;
    case $base . 'user':
        require __DIR__ . '/views/user/profile.php';
        break;
    case $base . 'update-profile':
        require __DIR__ . '/controller/user/UpdateProfile.php';
        break;
    case $base . 'login':
        require __DIR__ . '/views/login.php';
        break;
    case $base . 'signup':
        require __DIR__ . '/views/signup.php';
        break;
    case $base . 'auth':
        require __DIR__ . '/controller/security/Login.php';
        break;
    case $base . 'history':
        require __DIR__ . '/views/admin/history.php';
        break;
    case $base . 'update-details':
        require __DIR__ . '/controller/user/UpdateDetails.php';
        break;
    case $base . 'logs':
        require __DIR__ . '/views/user/logs.php';
        break;
    case $base . 'update-link':
        require __DIR__ . '/controller/user/UpdateLink.php';
        break;
    case $base . 'admin':
        require __DIR__ . '/views/admin/admin.php';
        break;
    case $base . 'visitor':
        require __DIR__ . '/views/visitor.php';
        break;
    case $base . 'logout':
        require __DIR__ . '/controller/security/Logout.php';
        break;
    case $base . 'redirect':
        require __DIR__ . '/controller/security/Redirect.php';
        break;
    case $base . 'register':
        require __DIR__ . '/controller/security/RegisterUser.php';
        break;
    case $base . 'home':
        require __DIR__ . '/views/home.php';
        break;
    default:
        http_response_code(404);
        require __DIR__ . '/views/error.php';
        break;
}
