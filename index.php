<?php

// Act as a router.
// all incoming request will be sent to this file.

$request = $_SERVER['REQUEST_URI'];

require_once './autoload.php';

// folder inside htdocs.
// check htaccess.
$base = '/market-system/';

// reroute request to views.
switch ($request) {
    case $base:
        require __DIR__ . '/views/home.php';
        break;
    case $base . 'about':
        require __DIR__ . '/views/about.php';
        break;
    case $base . 'products':
        require __DIR__ . '/views/products.php';
        break;
    case $base . 'product':
        require __DIR__ . '/php/fetch/product.php';
        break;
    case $base . 'team':
        require __DIR__ . '/views/team.php';
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
    case $base . 'findjob':
        require __DIR__ . '/views/findjob.php';
        break;
    case $base . 'user':
        require __DIR__ . '/views/userpanel.php';
        break;
    case $base . 'admin':
        require __DIR__ . '/views/admin.php';
        break;
    case $base . 'logout':
        require __DIR__ . '/controller/security/Logout.php';
        break;
    case $base . 'redirect':
        require __DIR__ . '/controller/security/Redirect.php';
        break;
    default:
        http_response_code(404);
        require __DIR__ . '/views/error.php';
        break;
}
