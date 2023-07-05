<div class="display-flex flex-align-items-center main-nav-menu">
    <form class="form-filter d-none" method="post" action="/products">
        <input name="brand">
        <input name="category">
    </form>
    <nav>
        <ul class="main-nav-menu-content">
            <li>
                <div class="dropdown">
                    <button location="products" class="dropitem">Productos</button>
                </div>
            </li>
            <li>
                <div class="dropdown">
                    <button class="dropitem">Mascotas</button>
                    <div class="dropdown-content" filter="category">
                        <?php Lists::getLinks($conn, 'categorys', 'id_category') ?>
                        <!-- <a href="#">Link 1</a>
                        <a href="#">Link 2</a>
                        <a href="#">Link 3</a> -->
                    </div>
                </div>
            </li>
            <li>
                <div class="dropdown">
                    <button class="dropitem">Marcas</button>
                    <div class="dropdown-content" filter="brand">
                        <?php Lists::getLinks($conn, 'brands', 'id_brand') ?>
                    </div>
                </div>
            </li>
            <!-- <li>
                <div class="dropdown">
                    <button location="products" class="dropitem">Promociones</button>
                </div>
            </li> -->
            <li>
                <div class="dropdown">
                    <button location="aboutus" class="dropitem">Sobre nosotros</button>
                </div>
            </li>
        </ul>   
    </nav>
    <div class="text-light ml-5">
        <span> Envios gratis a partir de $599</span>
    </div>
</div>
<div class="cart-section display-flex display-flex-row flex-align-items-center text-center d-none">
    <div class="cart-content">
        <h4 class="mt-1">CARRITO DE COMPRA</h4>
        <span class="material-symbols-outlined mt-1">
            shopping_cart
        </span>
        <div class="cart-product-content">
            <?php if(isset($cart[0])){ ?>
                <?php foreach($cart[0] as $c){ ?>
                    <div style="line-height: 25px;" class="display-flex flex-direction-row flex-align-items-center mt-2">
                        <div>
                            <img width="25%" height="25%" src="/src/img/cuyo.png">
                        </div>
                        <div>
                            <p><b><?=$c["name"]?></b></p>
                            <p><b>Cantidad:</b> <?=$c["quantity"]?></p>
                            <p>$<?=$c["price"]?></p>
                            <button onclick="deleteProductCart(<?=$c['id']?>, this)"  class="btn-confirm cursor-pointer btn-delete-product">Eliminar</button>
                        </div>
                    </div>
                <?php } ?>
            <?php } ?>  
        </div>
        <p class="mt-2"><b>Total:</b> $<span class="total"><?php echo (isset($cart["total"])) ? $cart["total"]:'0';?></span></p>
        <button data-target="modal-sale" style="position: fixed; bottom: 10px;" class="text-center btn-confirm cursor-pointer">Finalizar compra</button>
    </div>
</div>

<div id="modal-sale" class="modal">
    <div class="modal-body">
        <div class="signup-form">
            <form target-dismiss="modal" message="Pedido registrado correctamente" reload ajax action="/mail" method="post" class="form display-flex display-flex-column full-content signup-form">
                <label>Dirección</label>
                <input name="address" class="input" type="text" placeholder="Ingresa tu direccion">
                <label>Colonia</label>
                <input name="colony" class="input" type="text" placeholder="Ingresa tu colonia">
                <label>Numero exterior</label>
                <input name="num" class="input" type="number" placeholder="Ingresa tu numero exterior">
                <label>Codigo postal</label>
                <input name="cp" class="input" type="number" placeholder="Ingresa tu codigo postal">
                <button class="btn-primary" type="submit">Aceptar</button>
            </form>
        </div>
    </div>
</div>