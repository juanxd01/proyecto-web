<header>
    <div class="grid">
        <a href="/">
            <div style="background-image: url('/src/img/logo.png'); width: 5em; height: 5em; background-repeat: no-repeat; background-size: contain;">     
            </div>
        </a>
        <div>
            <form action="/products" method="post">
                <div class="display-flex">
                    <input name="search" style="width: 97%;" class="search-input" placeholder="Buscar..." type="text" />
                    <button style="width: 2.5%;" class="btn-search" type="submit"><span class="material-symbols-outlined text-light">
                        search
                    </span></button>
                </div>
            </form>
        </div>
        <div class="cursor-pointer" onclick="hideDisplayCartSection()">
            <span class="material-symbols-outlined ">
                shopping_cart <small class="cart-count"><?php echo (isset($cart[0])) ? count($cart[0]):'0';?></small>
            </span>
        </div>
        <?php if(!isset($_SESSION["id_user"])){ ?>
            <div class="cursor-pointer" onclick="showLoginForm()" data-target="modal">
                <span class="material-symbols-outlined ">
                    person
                </span>
            </div>
        <?php } else { ?>
            <div class="cursor-pointer" location="/logout">
                <span class="material-symbols-outlined ">
                    logout
                </span>
            </div>
        <?php } ?>
    </div>
</header>
<div id="modal" class="modal">
    <div class="modal-body">
        <div class="display-flex display-flex-row flex-justify-space-around">
            <button onclick="showLoginForm()" class="btn-form-login btn-log btn-form-login-active"><h4>Iniciar sesión</h4></button>
            <button onclick="showsignUpForm()" class="btn-form-login btn-sign" ><h4>Registrar</h4></button>
        </div>
        <div class="login-form">
            <form ajax reload action="/login" method="post" class="form display-flex display-flex-column full-content">
                <label>Correo electronico</label>
                <input name="email" class="input" type="text" placeholder="Ingresa tu correo electronico">
                <label>Contraseña</label>
                <input name="password" class="input" type="password" placeholder="Ingresa tu contraseña">
                <button class="btn-primary" type="submit">Aceptar</button>
            </form>
        </div>
        <div class="signup-form d-none">
            <form target-dismiss="modal" message="Usuario registrado correctamente" ajax action="/signup" method="post" class="form display-flex display-flex-column full-content signup-form">
                <label>Nombre</label>
                <input name="name" class="input" type="text" placeholder="Ingresa tu nombre">
                <label>Correo</label>
                <input name="email" class="input" type="text" placeholder="Ingresa tu correo electronico">
                <label>Telefono</label>
                <input name="phone" class="input" type="number" placeholder="Ingresa tu telefono">
                <label>Contraseña</label>
                <input name="password" class="input" type="password" placeholder="Ingresa tu contraseña">
                <label>Repetir contraseña</label>
                <input name="password2" class="input" type="password" placeholder="Repite tu contraseña">
                <button class="btn-primary" type="submit">Aceptar</button>
            </form>
        </div>
    </div>
</div>