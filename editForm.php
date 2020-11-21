<?php 
  require_once("./templates/header.php");
  include "./includes/class-autoload.inc.php";

  $posts = new Order();

  $post = $posts->editOrder($_GET['id']);
  $id = $post['id'];
  $name = $post['name'];
  $description = $post['description'];
  $receive = $post['receive'];

?>

  <div class="text-center my-5">
    <h3>Editar Orden</h3>
  </div>
  <div class="row">
    <div class="col-md-7 mx-auto">
      <!-- form input -->
      <form method="POST" action="post.process.php?send=update&id=<?= $id ?>">
        <div class="form-group">
          <label>Nombre: </label>
          <input class="form-control" name="order-name" type="text" value="<?= $name ?>" required>
        </div>
        <div class="form-group">
          <label>Detalle o descripcion:  </label>
          <textarea class="form-control"  name="order-content" rows="8" required><?= $description ?></textarea>
        </div>
        <div class="form-group">
          <label>Quien la recibe: </label>
          <input class="form-control" name="order-receive" type="text" value="<?= $receive ?>" required>
        </div>
          <a href="index.php" class="btn btn-secondary">cerrar</a>
          <button type="submit" class="btn btn-primary">actualizar</button>
      </form>
    </div>
  </div>
<?php 
  require_once("./templates/footer.php");
?>