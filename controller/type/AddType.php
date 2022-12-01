<?php

namespace controller\type;

use db\TypeDb;
use Exception;
use model\service\Type;

require_once 'autoload.php';

// Takes raw data from the request
$json = file_get_contents('php://input');

// Converts it into a PHP object
$data = json_decode($json, true);

function addType() {

    global $data;

    try {

        $type = new Type(
                $data['title'],
                $data['description'],
               );

        TypeDb::addType($type);
        echo json_encode(['message' => 'ok']);
    } catch (Exception $e) {
        http_response_code(403);
        echo json_encode(['message' => $e->getMessage()]);
    }
}

function isValid() {
    global $data;
    return isset($data['title'],$data['description']);
}

if (!isValid()) {
    http_response_code(401);
    echo json_encode(['message' => 'missing input']);
    die();
}

addType();
