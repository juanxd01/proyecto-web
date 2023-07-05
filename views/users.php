<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="/src/css/dashboard.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
</head>
<body>

<div class="dash">

    <header class="header">
      <div class="header__search">
      </div>
      <div class="header__options">
        <a href="/logout" class="header__link">Cerrar sesión</a>
      </div>
    </header>

    <div id="modal-delete" class="modal" id_record="" table="users" id_name="id_user">
      <div class="modal-body-sm">
          <div class="">
              <h1 style="margin-top: 3em">Borrar el registro</h1>
              <button style="margin-top: 3em" class="btn-primary" onclick="confirmDelete(this)">Borrar</button>
              <button class="btn-primary" onclick="hideModal(document.querySelector('#modal-delete'))">Cancelar</button>
          </div>
      </div>
    </div>

    <div id="modal" class="modal">
      <div class="modal-body">
          <div class="">
              <form method="post" class="form display-flex display-flex-column full-content signup-form">
                <label>Nombre</label>
                <input name="name" class="input" type="text" placeholder="Ingresa el nombre">
                <label>Correo</label>
                <input name="email" class="input" type="text" placeholder="Ingresa el correo electronico">
                <label>Telefono</label>
                <input name="phone" class="input" type="number" placeholder="Ingresa el telefono">
                <label>Contraseña</label>
                <input name="password" class="input" type="password" placeholder="Ingresa la contraseña">
                <label>Repetir contraseña</label>
                <input name="password2" class="input" type="password" placeholder="Repite la contraseña">
                <button class="btn-primary" type="submit">Aceptar</button>
              </form>
          </div>
      </div>
    </div>
  
    <div class="body">
  
    <div class="sidebar">
  
      <div location="/dashboard" class="sidebar__icon">
      <span class="material-symbols-outlined">
          shopping_basket
      </span>
      </div>

      <div location="/brands" class="sidebar__icon">
      <span class="material-symbols-outlined">
          receipt
      </span>
      </div>

      <!-- <div location="/offerts" class="sidebar__icon">
      <span class="material-symbols-outlined">
          sell
      </span>
      </div> -->

      <?php if($_SESSION["level"] == 1){ ?>
        <div location="/users" class="sidebar__icon">
        <span class="material-symbols-outlined">
            person
        </span>
        </div>
      <?php } ?>

      <div class="sidebar__icon">
      </div>

    </div>
  
      <main class="main">
        <div class="card">
            <div class="card-header">
                <h1>Administradores</h1>
                <button data-target="modal" class="btn-primary">Agregar nuevo</button>
            </div>
            <table>
            <tr>
                <th>Nombre</th> 
                <th>Correo</th>
                <th>Telefono</th>     
                <th>Acciones</th>
            </tr>
            <?php foreach($users as $user){ ?>
            <tr id_name="id_user" table="users" id_record="<?=$user["id_user"]?>">
                <td field="name" class="edit-record"><?=$user["name"]?></td>
                <td field="email" class="edit-record"><?=$user["email"]?></td>
                <td field="phone" class="edit-record"><?=$user["phone"]?></td>
                <td>
                    <button data-target="modal-delete" class="btn-primary delete">Eliminar</button>
                </td>
            </tr>
            <?php } ?>
            </table>
        </div>
  
      </main>
  
    </div>
  
  </div>
  <script src="/src/js/admin.js"></script>
</body>
</html>