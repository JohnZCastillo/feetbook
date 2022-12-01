<?php

namespace model\service;

class Service
{
    private $id;
    private $title;
    private $description;
    private $price;
    private $active;
    private $remarks;
    private $dateCreated;
    private $type;
    private $posterId;
    
    public function __construct($title, $description, $price, $active, $remarks, $type, $posterId) {
        $this->title = $title;
        $this->description = $description;
        $this->price = $price;
        $this->active = $active;
        $this->remarks = $remarks;
        $this->type = $type;
        $this->posterId = $posterId;
        $this->dateCreated = date('Y-m-d H:i:s') ;
    }

    public function getId() {
        return $this->id;
    }

    public function getTitle() {
        return $this->title;
    }

    public function getDescription() {
        return $this->description;
    }

    public function getPrice() {
        return $this->price;
    }

    public function getActive() {
        return $this->active;
    }

    public function getRemarks() {
        return $this->remarks;
    }

    public function getDateCreated() {
        return $this->dateCreated;
    }

    public function getType(){
        return $this->type;
    }

    public function getPosterId() {
        return $this->posterId;
    }

    public function setId($id): void {
        $this->id = $id;
    }

    public function setTitle($title): void {
        $this->title = $title;
    }

    public function setDescription($description): void {
        $this->description = $description;
    }

    public function setPrice($price): void {
        $this->price = $price;
    }

    public function setActive($active): void {
        $this->active = $active;
    }

    public function setRemarks($remarks): void {
        $this->remarks = $remarks;
    }

    public function setDateCreated($dateCreated): void {
        $this->dateCreated = $dateCreated;
    }

    public function setType($type): void {
        $this->type = $type;
    }

    public function setPosterId($posterId): void {
        $this->posterId = $posterId;
    }

}
