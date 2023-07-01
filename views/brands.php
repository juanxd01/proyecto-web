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

    <div id="modal-delete" class="modal" id_record="" table="brands" id_name="id_brand">
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
                  <input name="name" class="input" type="text" placeholder="Nombre de la marca">
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
                <h1>Marcas</h1>
                <button data-target="modal" class="btn-primary">Agregar nuevo</button>
            </div>
            <table>
            <tr>
                <th>Nombre</th>
                <th>Acciones</th>
            </tr>
            <?php foreach($brands as $brand){ ?>
            <tr id_name="id_brand" table="brands" id_record="<?=$brand["id_brand"]?>">
                <td field="name"><?=$brand["name"]?></td>
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
  <script src="/src/js/admin.js?a=4"></script>
</body>
</html>