<?php
require_once 'models/general.php';
require('src/fpdf182/fpdf.php');

function mainView($conn){
    $cart = [];
    if(isset($_SESSION["id_user"])){
        $cart = new Cart($conn, $_SESSION["id_user"]);
        $cart = $cart->cartProducts();        
    }
    include 'views/index.php';
}

function products($conn){
    $cart = [];
    $filter = 'state = 1';
    if(isset($_POST["brand"])){
        if($_POST["brand"] != '')$filter .= ' and brand = ' . $_POST["brand"];
    }
    if(isset($_POST["category"])){
        if($_POST["category"] != '')$filter .= ' and category = ' . $_POST["category"];
    }
    if(isset($_GET["page"])){
        if(!isset($_POST["category"])) $filter .= ' and category = ' . $_GET["page"];
    }
    if(isset($_SESSION["id_user"])){
        $cart = new Cart($conn, $_SESSION["id_user"]);
        $cart = $cart->cartProducts();
    }
    if(isset($_POST["search"])){
        if($_POST["search"] != '')$filter .= " and name LIKE '%" . $_POST["search"] . "%'";
    }
    $products = new Crud($conn);
    $products = $products->getData('products', $filter, 'id_product');
    include 'views/products.php';
}

function productDetails($conn){
    $cart = [];
    if(isset($_SESSION["id_user"])){
        $cart = new Cart($conn, $_SESSION["id_user"]);
        $cart = $cart->cartProducts();
    }
    if(isset($_GET["page"])){
        $id_product = $_GET["page"];
        $filters = "id_product = $id_product";
        $product = new Crud($conn);
        $product = $product->getData('products', $filters, 'id_product')[0];
        include 'views/product_details.php';
    }
}

function signup($conn){
    if(isset($_POST["name"])){
        $insert = new Crud($conn);
        $insert = $insert->insert('users', [
            "name" => $_POST["name"],
            "email" => $_POST["email"],
            "phone" => $_POST["phone"],
            "password" => $_POST["password"],
            "level" => 3
        ], true);
    }
}

function login($conn){
    if(isset($_POST["email"])){
        $login = new User($conn);
        $login = $login->login($_POST["email"], $_POST["password"]);
        echo $login;
    }
}

function admin($conn){
    include 'views/admin.php';
}

function dashboard($conn){
    if(!isset($_SESSION["level"])) return;
    if(isset($_POST["name"])){
        $dimentions = explode("x", $_POST["dimentions"]);
        $insert = new Crud($conn);
        $insert = $insert->insert('products', [
            "name" => $_POST["name"],
            "description" => $_POST["description"],
            "price" => $_POST["price"],
            "width" => $dimentions[1],
            "height" => $dimentions[2],
            "_long" => $dimentions[0],
            "weight" => $_POST["weight"],
            "state" => $_POST["state"],
            "category" => $_POST["category"],
            "brand" => $_POST["brand"],
        ]);
        if (isset($_FILES['img'])) {
            $errors= array();
            $file_name = $_FILES['img']['name'];
            $file_size = $_FILES['img']['size'];
            $file_tmp = $_FILES['img']['tmp_name'];
            $file_type = $_FILES['img']['type'];
            $file_type = explode("/", $file_type)[1];
            
            if($file_size > 2097152) {
                $errors[]='File size must be excately 2 MB';
            }
            
            if(empty($errors)==true) {
                move_uploaded_file($file_tmp,"src/img/products/".$_POST["name"] . "." . strtolower($file_type));
                //echo "Success";
            }else{
                print_r($errors);
            }
        }
    }
    $products = new Products($conn);
    $products = $products->getProducts();
    include 'views/dashboard.php';
}

function brands($conn){
    if(!isset($_SESSION["level"])) return;
    if(isset($_POST["name"])){
        $insert = new Crud($conn);
        $insert = $insert->insert('brands', [
            "name" => $_POST["name"],
        ]);
    }
    $brands = new Crud($conn);
    $brands = $brands->getData('brands', 'true', 'id_brand');
    include 'views/brands.php';
}

function users($conn){
    if(!isset($_SESSION["level"])) return;
    if(isset($_POST["name"])){
        $insert = new Crud($conn);
        $insert = $insert->insert('users', [
            "name" => $_POST["name"],
            "email" => $_POST["email"],
            "phone" => $_POST["phone"],
            "password" => $_POST["password"],
            "level" => 2
        ]);
    }
    $users = new Crud($conn);
    $users = $users->getData('users', 'level = 2', 'id_user');
    include 'views/users.php';
}

function _mail($conn){
    if(isset($_POST["address"])){
        $insert = new Crud($conn);
        $insert = $insert->insert('shipments', [
            "address" => $_POST["address"] . $_POST["num"],
            "colony" => $_POST["colony"],
            "cp" => $_POST["cp"],
            "id_user" => $_SESSION["id_user"],
        ]);
        $user = new User($conn);
        //$user = $user->sendMail(); 
        $cart = new Cart($conn, $_SESSION["id_user"]);
        $id_cart = $cart->getIdCart();
        $products = [];
        $products = $cart->cartProducts();
        $cart = $cart->finishOrder();
        if($cart){
            generatePdf($conn, $products, $id_cart);
        } else echo "ERROR";
    }
}

function generatePdf($conn, $products = [], $id_cart = 0){
    $total = $products["total"];
    $pdf = new FPDF();
    $pdf->AddPage();
    $pdf->SetFont('Arial','B',16);
    $pdf->Cell(0, 0, 'Productos Comprados');
    $pdf->SetY($pdf->GetY() + 10);
    $pdf->SetFont('Arial','B',14);
    $pdf->Cell(0, 0, 'NOMBRE                        DESCRIPCION                     PRECIO                      CANTIDAD');
    $pdf->SetFont('Arial', '', 10);
    foreach($products[0] as $product){
        $pdf->SetX(0);
        $pdf->SetY($pdf->GetY() + 10);
        $pdf->Cell(10, 3, substr($product["name"], 0, 24));
        $pdf->SetX($pdf->GetX() + 45);
        $pdf->Cell(10, 3, substr( $product["description"], 0, 24));
        $pdf->SetX($pdf->GetX() + 55);
        $pdf->Cell(10, 3, $product["price"]);
        $pdf->SetX($pdf->GetX() + 37);
        $pdf->Cell(10, 3, "1");
        //$pdf->Cell(0, 0 , $product["name"] . "                      " . substr($product["description"], 0, 20) . "                      " . $product["price"] . "                      1" );
    }

    $pdf->SetX(0);
    $pdf->SetY($pdf->GetY() + 10);
    $pdf->SetFont('Arial','B',12);
    $pdf->Cell(0,0, "TOTAL: $" . $total);
    
    //$file = $pdf->Output();
    $file = $pdf->Output('S');
    $file_name = $_SESSION["name"] . "cart_" . $id_cart . ".pdf";
    $ch = curl_init('juan:123456@10.0.0.20/save.php');
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, [
        "file_name" => $file_name,
        "file" => base64_encode($file),
    ]);
    $result = curl_exec($ch);
    curl_close($ch); 
    echo $file_name;
}

function aboutUs($conn){
    include 'views/about_us.php';
}

function logout($conn){
    session_destroy();
    header("Location: /");
}

function adminLogin($conn){
    if(isset($_POST["email"])){
        $login = new User($conn);
        $login = $login->adminLogin($_POST["email"], $_POST["password"]);
        if($login == "OK"){
            header("Location: /dashboard");
        }
    }
}

?>
