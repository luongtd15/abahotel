<?php
class RoomType
{
    public $id;
    public $name;
    public $number_of_beds;
    public $max_occupancy;
    public $price;
    public $description;

    public $pdo;

    public function __construct()
    {
        $this->pdo = (new Database())->pdo;
    }

    public function __destruct()
    {
        $this->pdo = null;
    }

    
}