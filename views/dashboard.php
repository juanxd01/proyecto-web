<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="/src/css/dashboard.css?a=2">
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

    <div id="modal-delete" class="modal" id_record="" table="products" id_name="id_product">
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
              <form enctype="multipart/form-data" method="post" class="form display-flex display-flex-column full-content signup-form">
                  <label>Imagen</label>
                  <input name="img" class="input" type="file" >  
                  <label>Nombre</label>
                  <input name="name" class="input" type="text" placeholder="Nombre del producto">
                  <label>Precio</label>
                  <input name="price" class="input" type="number" placeholder="Precio del producto">
                  <label>Descripcion</label>
                  <textarea name="description" class="input" type="text" placeholder="Descripcion"></textarea>
                  <label>Dimensiones (LARGO*ANCHO*ALTO)</label>
                  <input name="dimentions" class="input" type="text" placeholder="Dimensiones del producto">
                  <label>Peso</label>
                  <input step="any" name="weight" class="input" type="number" placeholder="Peso del producto">
                  <label>Categoria</label>
                  <select class="input" name="category">
                    <option></option>
                    <?php Lists::getList($conn, 'categorys', 'id_category'); ?>
                  </select>
                  <label>Marca</label>
                  <select class="input" name="brand">
                    <option></option>
                    <?php Lists::getList($conn, 'brands', 'id_brand'); ?>
                  </select>
                  <label>Estado</label>
                  <select class="input" name="state">
                    <option></option>
                    <?php Lists::getList($conn, 'product_state', 'id_state'); ?>
                  </select>
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
                <h1>Productos</h1>
                <button data-target="modal" class="btn-primary">Agregar nuevo</button>
            </div>
            <table>
            <tr>
                <th>Nombre</th>
                <th>Precio</th>
                <th>Dimensiones</th>
                <th>Peso</th>
                <th>Categoria</th>
                <th>Estado</th>
                <th>Marca</th>
                <th>Acciones</th>
            </tr>
            <?php foreach($products as $product){ ?>
            <tr id_name="id_product" table="products" id_record="<?=$product["id_product"]?>">
                <td field="name" class="edit-record"><?=$product["name"]?></td>
                <td field="price" class="edit-record">$<?=$product["price"]?></td>
                <td><?=$product["_long"]?>x<?=$product["width"]?>x<?=$product["height"]?> cm3</td>
                <td field="weight" class="edit-record"><?=$product["weight"]?> KG</td>
                <td><?=$product["_category"]?></td>
                <td><?=$product["_state"]?></td>
                <td><?=$product["_brand"]?></td>
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