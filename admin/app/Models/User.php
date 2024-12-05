<?php
class User
{
    public $id;
    public $name;
    public $age;
    public $address;
    public $phone;
    public $email;
    public $password;
    public $role;
    public $created_at;
    public $pdo;

    public function __construct()
    {
        $this->pdo = (new Database())->pdo;
    }

    public function __destruct()
    {
        $this->pdo = null;
    }

    public function getUserList()
    {
        try {
            $sql = "select * from users";
            $stmt = $this->pdo->query($sql);
            return $stmt->fetchAll();
        } catch (Exception $err) {
            echo "Error: " . $err->getMessage() . "<hr>";
            return [];
        }
    }

    public function createUser(User $user)
    {
        try {
            $sql = "INSERT INTO users (name, age, address, phone, email, password, role)
                VALUES (:name, :age, :address, :phone, :email, :password, :role)";
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute([
                ':name' => $user->name,
                ':age' => $user->age,
                ':address' => $user->address,
                ':phone' => $user->phone,
                ':email' => $user->email,
                ':password' => $user->password,
                ':role' => $user->role
            ]);

            return "New user created successfully";
        } catch (Exception $error) {
            echo "<h1>User create err: " . $error->getMessage() . "</h1>";
        }
    }

    public function getUser($id)
    {
        try {
            $sql = "SELECT*FROM users WHERE id = $id";
            $stmt = $this->pdo->query($sql)->fetch();
            if ($stmt !== false) {
                $user = new User();
                $user->id = $stmt->id;
                $user->name = $stmt->name;
                $user->age = $stmt->age;
                $user->address = $stmt->address;
                $user->phone = $stmt->phone;
                $user->email = $stmt->email;
                $user->password = $stmt->password;
                $user->role = $stmt->role;
                return $user;
            }
        } catch (Exception $err) {
            echo "Error: " . $err->getMessage() . "<hr>";
            return [];
        }
    }

    public function updateUser($id, User $user)
    {
        try {
            $sql = "UPDATE users SET  
            name = :name, 
            age = :age, 
            address = :address, 
            phone = :phone,
            email = :email,
            password = :password,
            role = :role
            WHERE id = $id";
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute([
                ':name' => $user->name,
                ':age' => $user->age,
                ':address' => $user->address,
                ':phone' => $user->phone,
                ':email' => $user->email,
                ':password' => $user->password,
                ':role' => $user->role
            ]);

            return true;
        } catch (Exception $error) {
            echo "<h1>User update err: " . $error->getMessage() . "</h1>";
        }
    }

    public function deleteUser($id)
    {
        try {
            $sql = "DELETE FROM users WHERE id = $id";
            $data = $this->pdo->exec($sql);
            if ($data === 1) {
                return "Delete user successfully";
            }
        } catch (Exception $error) {
            echo "<h1>";
            echo "User del err: " . $error->getMessage();
            echo "</h1>";
        }
    }

    public function checkEmailExists($email)
    {
        try {
            $sql = "SELECT COUNT(*) FROM users WHERE email = :email";
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute([':email' => $email]);
            return $stmt->fetchColumn() > 0; // Trả về true nếu email đã tồn tại
        } catch (Exception $err) {
            echo "Error checking email: " . $err->getMessage();
            return false;
        }
    }

    function getAdmin($email, $password)
    {

        try {
            $sql = "SELECT * FROM users WHERE email = :email AND password = :password AND role = 'Admin' LIMIT 1";

            $stmt = $this->pdo->prepare($sql);

            $stmt->execute([
                ":email" => $email,
                ":password" => $password,
            ]);

            return $stmt->fetch(PDO::FETCH_ASSOC);
        } catch (\Exception $err) {
            echo "Error: " . $err->getMessage();
            return null;
        }
    }

    public function getFeedbackForUser($id)
    {
        try {
            $sql = "select * from feedbacks WHERE id_user = $id";
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll();
        } catch (Exception $err) {
            echo "Error: " . $err->getMessage() . "<hr>";
            return [];
        }
    }
    public function getReservationForUser($id)
    {
        try {
            $sql = "select * from reservations WHERE id_user = $id";
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll();
        } catch (Exception $err) {
            echo "Error: " . $err->getMessage() . "<hr>";
            return [];
        }
    }


}
