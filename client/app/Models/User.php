<?php
class User
{
    public $name;
    public $age;
    public $address;
    public $phone;
    public $email;
    public $password;
    public $pdo;

    public function __construct()
    {
        $this->pdo = (new Database())->pdo;
        $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }

    public function __destruct()
    {
        $this->pdo = null;
    }

    public function insert_user(User $user)
    {
        try {

            $sql = "INSERT INTO users (name, age, address, phone, email, password) VALUES (:name, :age, :address, :phone, :email, :password)";
            $stmt = $this->pdo->prepare($sql);


            $result =  $stmt->execute([
                ':name' => $user->name,
                ':age' => $user->age,
                ':address' => $user->address,
                ':phone' => $user->phone,
                ':email' => $user->email,
                ':password' => $user->password,

            ]);


            if ($result) {
                echo "Dữ liệu đã được lưu thành công.";
            } else {
                echo "Lỗi khi thực thi câu lệnh INSERT.";
            }


            return true;
        } catch (Exception $error) {
            echo "<h1>Lỗi hàm thêm người dùng trong model: " . $error->getMessage() . "</h1>";
            return false;
        }
    }
    public function checklogin($email, $password)
    {
        //var_dump()
        
       

        try {
            //code...
            $sql = "SELECT * FROM users WHERE email = :email";
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute(['email' => $email]);
            // if ($stmt->errorCode() != '00000') {
            //     // In lỗi nếu có
            //     print_r($stmt->errorInfo());
            // }
            $user = $stmt->fetch();

            // var_dump($email);
            // var_dump($user === false);
            // die;
            // var_dump($password);
            // var_dump($user);
            

            // if ($user === false) {
            //     echo "Không tìm thấy người dùng.";
            // } else {
            //     //var_dump($user);
            // }

           
            if ($user && password_verify($password, $user->password)) {
                
                // $_SESSION['user_id'] = $user['id'];
                $_SESSION['user_email'] =$user->email;

                // Có thể trả về true hoặc thông tin người dùng để xác nhận thành công

                return $user->email;
            } else {
                return false;
            }
        } catch (Exception $e) {
            //throw $th;
            error_log("Lỗi khi đăng nhập: " . $e->getMessage());
            return false;
        }
    }
}
