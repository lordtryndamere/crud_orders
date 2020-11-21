<?php 
  include "./includes/class-autoload.inc.php";
  require_once("./templates/header.php");
?>
<div class="text-center">
  <button class="my-5 btn btn-primary" data-toggle="modal" data-target="#addPostModal">Craer Orden</button>
</div>

<!-- Modal -->
<div class="modal fade" id="addPostModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Crear una nueva orden</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <!-- form input -->
        <form method="POST" action="post.process.php">
          <div class="form-group">
            <label>Nombre: </label>
            <input class="form-control" name="order-name" type="text" required>
          </div>
          <div class="form-group">
            <label>Detalle o descripcion: </label>
            <textarea class="form-control"  name="order-description" required></textarea>
          </div>
          <div class="form-group">
            <label>Quien la recibe: </label>
            <input class="form-control" name="order-receive" type="text" required>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
            <button type="submit" name="submit" class="btn btn-primary">Añadir orden</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>

<!-- <div class="row">
  <div class="col-md-6">
    <div class="card">
      <div class="card-body">
        <h5 class="card-title">Post One</h5>
        <p class="card-text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Laborum, molestias distinctio? Maxime non deserunt praesentium nihil ipsum, eaque adipisci a accusamus ut officia iure nisi sit, quod voluptas officiis modi.</p>
        <h6 class="card-subtitle text-muted text-right">Author: Candra</h6>
        <button class="btn btn-warning">Edit</button>
        <button class="btn btn-danger">Delete</button>
      </div>
    </div>
  </div>
  <div class="col-md-6">
  <div class="card">
    <div class="card-body">
      <h5 class="card-title">Post Two</h5>
      <p class="card-text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Laborum, molestias distinctio? Maxime non deserunt praesentium nihil ipsum, eaque adipisci a accusamus ut officia iure nisi sit, quod voluptas officiis modi.</p>
      <h6 class="card-subtitle text-muted text-right">Author: John DOe</h6>
      <button class="btn btn-warning">Edit</button>
      <button class="btn btn-danger">Delete</button>
    </div>
  </div>
</div> -->

<div class="row">
  <?php 
    $order = new Order();
    if($order->getOrders()) {
      foreach($order->getOrders() as $orders) {
        echo '<div class="col-md-6 mt-4">';
        echo '<div class="card">';
        echo '<div class="card-body">';
        echo "<h5 class='card-title'>" . $orders['name'] . "</h5>";
        echo "<p class='card-text'>" . $orders['description'] . "</p>";
        echo "<h6 class='card-subtitle text-muted text-right'>" . $orders['receive'] . "</h6>";
        echo "<a  href='editForm.php?id=" . $orders['id'] . "' class='btn btn-warning'>Edit</a> ";
        echo "<a href='post.process.php?send=del&id=" . $orders['id'] . "' class='btn btn-danger'>Delete</a>";
        echo "</div>";
        echo "</div>";
        echo "</div>";
      }
    }  else {
      echo "<p class='mt-5 mx-auto'>No hay ordenes...</p>";
    }
  ?>
</div>

<?php 
  require_once("./templates/footer.php");
?>