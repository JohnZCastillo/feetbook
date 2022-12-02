<?php

namespace model\service;

class Type
{
    private $id;
    private $title;
    private $description;
    private $dateCreated;
    private $active;

    public function __construct($title, $description)
    {
        $this->title = $title;
        $this->description = $description;
        $this->dateCreated = date('Y-m-d H:i:s');
        $this->active = 0;
    }

    public function getId()
    {
        return $this->id;
    }

    public function getTitle()
    {
        return $this->title;
    }

    public function getDescription()
    {
        return $this->description;
    }

    public function getDateCreated()
    {
        return $this->dateCreated;
    }

    public function getActive()
    {
        return $this->active;
    }

    public function setId($id): void
    {
        $this->id = $id;
    }

    public function setTitle($title): void
    {
        $this->title = $title;
    }

    public function setDescription($description): void
    {
        $this->description = $description;
    }

    public function setDateCreated($dateCreated): void
    {
        $this->dateCreated = $dateCreated;
    }

    public function setActive($active): void
    {
        $this->active = $active;
    }
}
