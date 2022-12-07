<?php

namespace controller\service;

use db\ServiceDb;
use Exception;
use model\service\Service;

require_once 'autoload.php';

try {

    // Takes raw data from the request
    $json = file_get_contents('php://input');

    // Converts it into a PHP object
    $data = json_decode($json, true);

    function addService()
    {

        global $data;

        try {

            $service = new Service(
                $data['title'],
                $data['description'],
                $data['price'],
                $data['active'],
                $data['remakrs'],
                $data['type'],
                $data['posterId']
            );

            ServiceDb::addService($service);
            echo json_encode(['message' => 'ok']);
        } catch (Exception $e) {
            http_response_code(403);
            echo json_encode(['message' => $e->getMessage()]);
        }
    }

    function isValid()
    {
        global $data;
        return isset(
            $data['title'],
            $data['description'],
            $data['price'],
            $data['active'],
            $data['remakrs'],
            $data['type'],
            $data['posterId']
        );
    }

    if (!isValid()) {
        http_response_code(401);
        echo json_encode(['message' => 'missing input']);
        die();
    }

    addService();
} catch (Exception $e) {
    http_response_code(500);
    echo json_encode(['message' => $e->getMessage()]);
}
