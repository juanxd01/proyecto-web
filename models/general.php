<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

if(is_file('vendor/autoload.php')) require 'vendor/autoload.php';

class Crud{
    private $conn;

    function __construct($conn){
        $this->conn = $conn;
    }

    public function getData($table, $filters, $id){
        $data = [];
        $sql = "SELECT * FROM $table WHERE $filters ORDER BY $id DESC";
        $result = $this->conn->query($sql);
        echo $this->conn->error;
        while($row = $result->fetch_assoc()){
            array_push($data, $row);
        }
        return $data;
    }

    public function insert($table, $array, $show = false){
        $fields = "";
        $values = "";
        $i = 1;
        foreach($array as $key=>$data){
            $fields .= $key;
            $values .= "'$data'";
            if($i < count($array)){
                $fields .= ", ";
                $values .= ", ";
            }
            $i++;
        }
        $sql = "INSERT INTO $table ($fields) VALUES ($values)";
        $result = $this->conn->query($sql);
        if($show) echo "OK";
    }

    public function update($table, $id, $array, $id_name){
        $sentence = "";
        $i = 1;
        foreach($array as $key=>$data){
            $sentence = "$key = '$data'";
            if($i < count($array)) $sentence = ", ";
            $i++;
        }
        $sql = "UPDATE $table SET $sentence WHERE $id_name = $id";
        $result = $this->conn->query($sql);
    }

    public function delete($table, $id, $id_name){
        $sql = "DELETE FROM $table WHERE $id_name = $id";
        $result = $this->conn->query($sql);
    }
}

class User{
    private $conn;

    function __construct($conn){
        $this->conn = $conn;
    }

    public function login($email, $password){
        $sql = "SELECT * FROM users WHERE email = '$email' AND level = 3";
        $result = $this->conn->query($sql);
        if($result->num_rows > 0){
            $data = $result->fetch_assoc();
            if($data["password"] == $password) return self::startSession($data);
            else return "BAD_PASS";
        } else {
            return "NOT_FOUND";
        }
    }

    public function adminLogin($email, $password){
        $sql = "SELECT * FROM users WHERE email = '$email' AND (level = 1 OR level = 2)";
        $result = $this->conn->query($sql);
        if($result->num_rows > 0){
            $data = $result->fetch_assoc();
            if($data["password"] == $password) return self::startSession($data);
            else return "BAD_PASS";
        } else {
            return "NOT_FOUND";
        }
    }

    public function startSession($data_user){
        $_SESSION["id_user"] = $data_user["id_user"];
        $_SESSION["email"] = $data_user["email"];
        $_SESSION["name"] = $data_user["name"];
        $_SESSION["level"] = $data_user["level"];
        return "OK"; 
    }

    public function sendMail(){
        $mail = new PHPMailer(true);

        try {
            //Server settings
            $mail->isSMTP();                                            //Send using SMTP
            $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
            $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
            $mail->Username   = 'a21110146@ceti.mx';                     //SMTP username
            $mail->Password   = 'ju220701';                               //SMTP password
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
            $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

            //Recipients
            $mail->setFrom('a21110146@ceti.mx', 'Juan');
            $mail->addAddress($_SESSION["email"], 'Joe User');     //Add a recipient

            //Content
            $mail->isHTML(true);                                  //Set email format to HTML
            $mail->Subject = 'Confimacion del pedido';
            $mail->Body    = 'This is the HTML message body <b>in bold!</b>';
            $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

            $mail->send();
            } catch (Exception $e) {
                echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
            }
        }
}

class Cart{
    private $conn;
    private $id_cart;
    private $id_user;

    function __construct($conn, $id_user){
        $this->conn = $conn;
        $this->id_user = $id_user;
        $this->id_cart = self::getIdCart($this->id_user);
    }

    function deleteProduct($id){
        $sql = "DELETE FROM cart_products WHERE id = $id AND id_cart = " . $this->id_cart;
        $result = $this->conn->query($sql);
        echo json_encode(["status" => true]);
    }

    function getIdCart(){
        $sql = "SELECT * FROM cart WHERE id_user = ".$this->id_user." AND finished = 0";
        $result = $this->conn->query($sql);
        if($result->num_rows > 0) return $result->fetch_assoc()["id_cart"];
        else self::createCart($this->id_user);
    }

    function createCart(){
        $sql = "INSERT INTO cart (id_user, finished) VALUES (".$this->id_user.", 0)";
        $result = $this->conn->query($sql);
    }

    function addProduct($product, $quantity){
        $sql = "INSERT INTO cart_products (id_cart, id_product, quantity) VALUES ('".$this->id_cart."', '$product', '$quantity')";
        $result = $this->conn->query($sql);
        if($result === TRUE) {
            $sql = "SELECT * FROM products WHERE id_product = $product";
            $result = $this->conn->query($sql)->fetch_assoc();
            $result["quantity"] = $quantity;
            $result["cart_prodcut"] = $this->conn->query("SELECT max(id) FROM cart_products WHERE id_cart = " . $this->id_cart)->fetch_assoc()["max(id)"];
            echo json_encode(["status" => true, "data" => [$result]]);
        }
        else echo $this->conn->error;
    }

    function cartProducts(){
        if(!isset($this->id_cart)) return [];
        $data = [];
        $total = 0;
        $sql = "SELECT * FROM cart_products 
                LEFT JOIN cart ON cart_products.id_cart = cart.id_cart 
                LEFT JOIN products ON cart_products.id_product = products.id_product 
                WHERE cart.id_cart = ".$this->id_cart." AND cart.finished = 0"; 
        $result = $this->conn->query($sql);
        while($row = $result->fetch_assoc()){
            $total += $row["quantity"] * $row["price"];
            array_push($data, $row);
        }
        return ["total" => $total, $data];
    }
    
    function finishOrder(){
        $sql = "UPDATE cart SET finished = 1 WHERE id_cart = " . $this->id_cart;
        $result = $this->conn->query($sql);
    }
}

class Lists{
    public static function getList($conn, $table, $id){
        $sql = "SELECT * FROM $table ORDER BY $id DESC";
        $result = $conn->query($sql);
        while($row = $result->fetch_assoc()){
            $i = $row[$id];
            $name = $row["name"];
            echo '<option value="'.$i.'">'.$name.'</option>';
        }
    }

    public static function getLinks($conn, $table, $id){
        $sql = "SELECT * FROM $table ORDER BY $id DESC";
        $result = $conn->query($sql);
        while($row = $result->fetch_assoc()){
            $i = $row[$id];
            $name = $row["name"];
            echo '<a onclick="filterForm(this, '.$i.')">'.$name.'</a>';
        }
    }
}

class Products{
    private $conn;

    function __construct($conn){
        $this->conn = $conn;
    }

    function getProducts(){
        $data = [];
        $category = "(SELECT name FROM categorys WHERE id_category = products.category) as _category";
        $product_state = "(SELECT name FROM product_state WHERE id_state = products.state) as _state";
        $brand = "(SELECT name FROM brands WHERE id_brand = products.brand) as _brand";
        $sql = "SELECT *, $category, $product_state, $brand FROM products ORDER BY id_product DESC";
        $result = $this->conn->query($sql);
        while($row = $result->fetch_assoc()){
            array_push($data, $row);
        }
        return $data;
    }
}

?>