<?php

namespace controller\user;

use db\UserDb;
use model\user\Role;

require_once 'autoload.php';

// Note! This File expext a json format{email: '',password: ''}
// Takes raw data from the request

$data = array();

foreach (UserDb::getAllUser() as $user) {

    if ($user->getRole() !== Role::$USER) continue;

    $action = "<button>active</button><button>delete</button>";

    array_push($data,  $user->getId());
    array_push($data,  $user->getName());
    array_push($data,  $user->getEmail());
    array_push($data,  $user->getBirthday());

    $status = $user->isValid()  ? "active" : "deactivated";

    array_push($data,  $status);
    array_push($data,  $action);

    array_push($users,  $data);
}
