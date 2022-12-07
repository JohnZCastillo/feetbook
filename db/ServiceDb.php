<?php

namespace db;

require_once 'autoload.php';

use Exception;
use db\Database;
use model\service\Service;

class ServiceDb
{

    // add service 
    public static function addService(Service $service)
    {

        $id = $service->getId();
        $title = $service->getTitle();
        $description = $service->getDescription();
        $price = $service->getPrice();
        $active = $service->getActive();
        $remarks = $service->getRemarks();
        $dateCreated = $service->getDateCreated();
        $type = $service->getType();
        $posterId = $service->getPosterId();

        $connection = Database::open();

        $stmt = $connection->prepare("INSERT INTO service(title,description,price,active,remarks,dateCreated,type_id,poster_id) values(?,?,?,?,?,?,?,?)");

        $stmt->bind_param(
            "ssddssss",
            $title,
            $description,
            $price,
            $active,
            $remarks,
            $dateCreated,
            $type,
            $posterId,
        );

        $stmt->execute();

        $error = mysqli_error($connection);

        Database::close($connection);

        return $error;
    }


    //return services
    public static function getServices()
    {

        // open database connection
        $conn = Database::open();

        $stmt = $conn->prepare("SELECT * FROM service");

        // execute prepared statement
        $stmt->execute();

        //get result
        $result = $stmt->get_result();

        $services = array();

        while ($data = $result->fetch_assoc()) {

            //create service            
            $service = new Service(
                $data['title'],
                $data['description'],
                $data['price'],
                $data['active'],
                $data['remarks'],
                $data['type_id'],
                $data['poster_id']
            );

            //update date created base on db
            $service->setDateCreated($data['dateCreated']);

            // update id baso on db
            $service->setId($data['id']);

            array_push($services, $service);
        }

        Database::close($conn);

        // throw an exception data is null that means username is not present in db
        if ($services == null) {
            throw new Exception('No services yet');
        }

        return $services;
    }
}
