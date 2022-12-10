<?php

// Act as a router.
// all incoming request will be sent to this file.

$request = $_SERVER['REQUEST_URI'];

require_once './autoload.php';

// folder inside htdocs.
// check htaccess.
$base = '/feetbook/';

// reroute request to views.
switch ($request) {
    case $base:
        require __DIR__ . '/views/home.php';
        break;
    case $base . 'explore':
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
    case $base . 'dashboard':
        require __DIR__ . '/views/admin/dashboard.php';
        break;
    case $base . 'add-service':
        require __DIR__ . '/controller/service/AddService.php';
        break;
    case $base . 'employeer':
        require __DIR__ . '/views/employeer.php';
        break;
    case $base . 'add-type':
        require __DIR__ . '/controller/type/AddType.php';
        break;
    case $base . 'services':
        require __DIR__ . '/views/admin/services.php';
        break;
    case $base . 'dashboard':
        require __DIR__ . '/views/admin/dashboard.php';
        break;
    case $base . 'customers':
        require __DIR__ . '/views/admin/customers.php';
        break;
    case $base . 'category':
        require __DIR__ . '/views/admin/service-category.php';
        break;
    case $base . 'provider':
        require __DIR__ . '/views/admin/service-provider.php';
        break;
    case $base . 'home':
        require __DIR__ . '/views/home.php';
        break;
    default:
        http_response_code(404);
        require __DIR__ . '/views/error.php';
        break;
}
