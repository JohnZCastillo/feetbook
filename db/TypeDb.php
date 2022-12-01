<?php

namespace db;

require_once 'autoload.php';

use db\Database;
use model\service\Type;

class TypeDb{
 
     public static function addType(Type $type){
       
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
}