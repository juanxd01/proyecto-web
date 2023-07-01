<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio</title>
    <link rel="stylesheet" href="src/css/style.css?a=3">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />
</head>
<body>
<div id="snackbar"></div>
    <?php include 'includes/header.php' ?>
    <div class="main">
    <?php include 'includes/nav_menu.php' ?>
        <div class="slideshow-container">

            <div class="mySlides fade">
            <div class="numbertext">1 / 3</div>
            <img src="src/img/cuyo.png" style="width:100%">
            <div class="text">Caption Text</div>
            </div>

            <div class="mySlides fade">
            <div class="numbertext">2 / 3</div>
            <img src="src/img/cuyo.png" style="width:100%">
            <div class="text">Caption Two</div>
            </div>

            <div class="mySlides fade">
            <div class="numbertext">3 / 3</div>
            <img src="src/img/cuyo.png" style="width:100%">
            <div class="text">Caption Three</div>
            </div>

            <a class="prev" onclick="plusSlides(-1)">❮</a>
            <a class="next" onclick="plusSlides(1)">❯</a>

            </div>
            <br>

            <div style="text-align:center">
            <span class="dot" onclick="currentSlide(1)"></span> 
            <span class="dot" onclick="currentSlide(2)"></span> 
            <span class="dot" onclick="currentSlide(3)"></span> 
        </div>

        <div>
            <h1 class="text-center m1">Comprar por mascota</h1>
            <div class="display-flex flex-justify-space-around">
                <div location="products/page_1" class="display-flex display-flex-column">
                    <div class="circle-img">
                        <img class="img" src="src/img/perro.jpg">
                    </div>
                    <span class="text-center">Perros</span>
                </div>
                <div location="products/page_2" class="display-flex display-flex-column">
                    <div class="circle-img">
                        <img class="img" src="src/img/gato.jpg">
                    </div>
                    <span class="text-center">Gatos</span>
                </div>
                <div location="products/page_3" class="display-flex display-flex-column">
                    <div class="circle-img">
                        <img class="img" src="src/img/cuyo.png">
                    </div>
                    <span class="text-center">Roedores</span>
                </div>
                <div location="products/page_4" class="display-flex display-flex-column">
                    <div class="circle-img">
                        <img class="img" src="src/img/aves.jpg">
                    </div>
                    <span class="text-center">Aves</span>
                </div>
                <div location="products/page_5" class="display-flex display-flex-column">
                    <div class="circle-img">
                        <img class="img" src="src/img/reptiles.jpg">
                    </div>
                    <span class="text-center">Reptiles</span>
                </div>
            </div>
        </div>
    </div>
    <?php include 'includes/footer.php' ?>
</body>
</html>