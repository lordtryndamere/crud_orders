<?php 

class Order extends Dbh {

  public function getOrders() {
    $sql = "SELECT * FROM orders";
    $stmt = $this->connect()->prepare($sql);
    $stmt->execute();

    while($result = $stmt->fetchAll()) {
      return $result;
    };
  }

  public function addOrder($name, $description, $receive) {
    $sql = "INSERT INTO orders(name, description, receive) VALUES (?, ?, ?)";
    $stmt = $this->connect()->prepare($sql);
    $stmt->execute([$name, $description, $receive]);
  }

  public function editOrder($id) {
    $sql = "SELECT * FROM orders WHERE id = ?";
    $stmt = $this->connect()->prepare($sql);
    $stmt->execute([$id]);
    $result = $stmt->fetch();

    return $result;
  }

  public function updateOrder($id, $name, $description, $receive) {
    $sql = "UPDATE orders SET name = ?, description = ?, receive = ? WHERE id = ?";
    $stmt = $this->connect()->prepare($sql);
    $stmt->execute([$name, $description, $receive, $id]);
  }

  public function delOrder($id) {
    $sql = "DELETE FROM orders WHERE id = ?";
    $stmt = $this->connect()->prepare($sql);
    $stmt->execute([$id]);
  }
}