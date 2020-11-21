<?php 
  include "./includes/class-autoload.inc.php";

  $order = new Order();
  
  if(isset($_POST['submit'])) {
    $name = $_POST['order-name'];
    $description = $_POST['order-description'];
    $receive= $_POST['order-receive'];
  
    $order->addOrder($name, $description, $receive);
  
    header("location: {$_SERVER['HTTP_ORIGIN']}/crud-orders/index.php?status=added");
  
  } else if($_GET['send'] === 'del') {
    $id = $_GET['id'];
    $order->delOrder($id);

    header("location: {$_SERVER['HTTP_ORIGIN']}/crud-orders/index.php?status=deleted");
  } else if($_GET['send'] === 'update') {
    $id = $_GET['id'];

    $name = $_POST['order-name'];
    $description = $_POST['order-content'];
    $receive = $_POST['order-receive'];

    $order->updateOrder($id, $name, $description, $receive);

    header("location: {$_SERVER['HTTP_ORIGIN']}/crud-orders/index.php?status=updated");
  }
