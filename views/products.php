<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio</title>
    <link rel="stylesheet" href="/src/css/style.css?a=1">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />
</head>
<body>
<div id="snackbar"></div>
    <?php include 'includes/header.php' ?>
    <div class="main"> <!-- inicio main -->
    <?php include 'includes/nav_menu.php' ?>
        <div class="display-flex display-flex-row">
            <div class="product-filter">
                <div class="filters">
                    <form action="" method="post" style="padding: 1em;">
                        <label><b>Tipo de mascota</b></label>
                        <select name="category" class="input">
                            <option></option>
                            <?php Lists::getList($conn, 'categorys', 'id_category') ?>
                        </select>
                        <label><b>Marca</b></label>
                        <select name="brand" class="input">
                            <option></option>
                            <?php Lists::getList($conn, 'brands', 'id_brand') ?>
                        </select>
                        <button type="submit" class="btn-primary text-center mt-1">Filtrar</button>
                    </form>
                </div>
            </div>
            <div style="column-gap: 1em; row-gap: 1em;" class="products-content display-flex display-flex-row mt-2">
            
            <?php foreach($products as $product){
                if(is_file('src/img/products/'.$product["name"].'.jpg')) $img = '/src/img/products/'.$product["name"].'.jpg';
                if(is_file('src/img/products/'.$product["name"].'.jpeg')) $img = '/src/img/products/'.$product["name"].'.jpeg';
                if(is_file('src/img/products/'.$product["name"].'.png')) $img = '/src/img/products/'.$product["name"].'.png';
                ?>
                <div id_product="<?=$product["id_product"]?>" class="card text-center display-flex display-flex-column line-height">
                        <img location="/product_details/page_<?=$product["id_product"]?>" class="center" width="90%" height="60%" src="<?=$img?>">
                    <div>
                        <h4><?=$product["name"]?></h4>
                        <p>$<?=$product["price"]?></p>
                        <button class="btn-cart">
                            <span class="material-symbols-outlined">
                                add_shopping_cart
                            </span>
                        </button>
                    </div>
                </div>
            <?php } ?>
            </div>
        </div>
     </div> <!-- fin main -->
    <?php include 'includes/footer.php' ?>
</body>
</html>