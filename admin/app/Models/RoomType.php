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

    public function createRoomType(RoomType $roomType)
    {
        try {
            $sql = "INSERT INTO room_types (name, number_of_beds, price, max_occupancy, description)
                VALUES (:name, :number_of_beds, :price, :max_occupancy, :description)";
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute([
                ':name' => $roomType->name,
                ':number_of_beds' => $roomType->number_of_beds,
                ':price' => $roomType->price,
                ':max_occupancy' => $roomType->max_occupancy,
                ':description' => $roomType->description
            ]);

            return "New room type created successfully";
        } catch (Exception $error) {
            echo "<h1>Lỗi hàm create trong model: " . $error->getMessage() . "</h1>";
        }
    }

    public function getRoomType($id)
    {
        try {
            $sql = "SELECT*FROM room_types WHERE id = $id";
            $stmt = $this->pdo->query($sql)->fetch();
            if ($stmt !== false) {
                $roomType = new RoomType();
                $roomType->id = $stmt->id;
                $roomType->name = $stmt->name;
                $roomType->number_of_beds = $stmt->number_of_beds;
                $roomType->description = $stmt->description;
                $roomType->price = $stmt->price;
                $roomType->max_occupancy = $stmt->max_occupancy;
                return $roomType;
            }
        } catch (Exception $err) {
            echo "Error: " . $err->getMessage() . "<hr>";
            return [];
        }
    }

    public function updateRoomType($id, RoomType $roomType)
    {
        try {
            $sql = "UPDATE room_types SET 
            name = :name, 
            number_of_beds = :number_of_beds, 
            price = :price, 
            max_occupancy = :max_occupancy, 
            description = :description
            WHERE id = $id";
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute([
                ':name' => $roomType->name,
                ':number_of_beds' => $roomType->number_of_beds,
                ':price' => $roomType->price,
                ':max_occupancy' => $roomType->max_occupancy,
                ':description' => $roomType->description
            ]);

            return "New room type updated successfully";
        } catch (Exception $error) {
            echo "<h1>Room type update err: " . $error->getMessage() . "</h1>";
        }
    }

    public function deleteRoomType($id)
    {
        try {
            $sql = "DELETE FROM room_types WHERE id = $id";
            $data = $this->pdo->exec($sql);
            if ($data === 1) {
                return "Delete room type successfully";
            }
        } catch (Exception $error) {
            echo "<h1>";
            echo "Cannot delete this room type: " . $error->getMessage();
            echo "</h1>";
        }
    }
}
