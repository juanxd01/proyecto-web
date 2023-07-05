<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio</title>
    <link rel="stylesheet" href="/src/css/style.css?a=2">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />
</head>
<body>
<div id="snackbar"></div>
    <?php include 'includes/header.php' ?>
    <div class="main"> <!-- inicio main -->
    <?php include 'includes/nav_menu.php' ?>
        <div class="full-content line-height">
            <div class="product-info display-flex display-flex-column flex-justify-space-around">
                <div class="display-flex display-flex-row flex-justify-space-around flex-align-items-center">
                    <div style="width: 25%;">
                    <?php
                        $img = "";
                        if(is_file('src/img/products/'.$product["name"].'.jpg')) $img = '/src/img/products/'.$product["name"].'.jpg';
                        if(is_file('src/img/products/'.$product["name"].'.jpeg')) $img = '/src/img/products/'.$product["name"].'.jpeg';
                        if(is_file('src/img/products/'.$product["name"].'.png')) $img = '/src/img/products/'.$product["name"].'.png';
                    ?>
                        <img width="100%" height="100%" src="<?=$img?>">
                    </div>
                    <div class="mt-2">
                        <h1><?=$product["name"]?></h1>
                        <p>$<?=$product["price"]?></p>

                        <input class="input quantity" type="number" value="1">
                        <button id_record="<?=$product["id_product"]?>" class="btn-primary mt-1 btn-cart" style="background-color: #286ace">Añadir al carrito</button>
                    </div>
                </div>
                <div class="text-center mt-2">
                    <button class="btn-transparent">DESCRIPCIÓN</button> 
                </div>
                <div class="description text-gray">
                    <pre></pre>
                    <?=$product["description"]?>
                </div>
            </div>
        </div>
     </div> <!-- fin main -->
    <?php include 'includes/footer.php' ?>
</body>
</html>