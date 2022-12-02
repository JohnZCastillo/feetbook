<?php

namespace db;

require_once 'autoload.php';

use Exception;
use db\Database;
use model\service\Type;

class TypeDb
{

    public static function addType(Type $type)
    {

        $title = $type->getTitle();
        $description = $type->getDescription();
        $dateCreated = $type->getDateCreated();
        $active = $type->getActive();

        $connection = Database::open();

        $stmt = $connection->prepare("INSERT INTO type(title,description,active,dateCreated) values(?,?,?,?)");

        $stmt->bind_param(
            "ssds",
            $title,
            $description,
            $active,
            $dateCreated,
        );

        $stmt->execute();

        $error = mysqli_error($connection);

        Database::close($connection);

        return $error;
    }

    public static function getTypes()
    {

        // open database connection
        $conn = Database::open();

        $stmt = $conn->prepare("SELECT * FROM type");

        // execute prepared statement
        $stmt->execute();

        //get result
        $result = $stmt->get_result();

        $types = array();

        while ($data = $result->fetch_assoc()) {

            //create type            
            $type = new Type(
                $data['title'],
                $data['description']
            );

            //update date created base on db
            $type->setDateCreated($data['dateCreated']);

            // update id baso on db
            $type->setId($data['id']);

            // update active
            $type->setId($data['active']);

            array_push($types, $type);
        }

        Database::close($conn);

        // throw an exception data is null that means username is not present in db
        if ($types == null) {
            throw new Exception('Type Not found');
        }

        return $types;
    }
}
