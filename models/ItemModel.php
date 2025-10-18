<?php
require_once 'config/database.php';

class ItemModel extends Database {

    public function showAllItem() {
        $query = "SELECT * FROM items";
        $result = $this->conn->query($query);
        return $result;
    }

    public function userUnit($user_id) {
        $query = "SELECT * FROM users WHERE id = $user_id";
        $result = $this->conn->query($query);
        return $result->fetch_assoc();
    }

    public function store($data) {
        $nama = $data['nama'];
        $harga = $data['harga'];
        $stok = $data['stok'];

        $query = "INSERT INTO items (nama, harga, stok) VALUES ('$nama', '$harga', '$stok')";
        return $this->conn->query($query);
    }

    public function update($id, $data) {
        $nama = $data['nama'];
        $harga = $data['harga'];
        $stok = $data['stok'];

        $query = "UPDATE items SET nama='$nama', harga='$harga', stok='$stok' WHERE id=$id";
        return $this->conn->query($query);
    }


    public function delete($id) {
        $query = "DELETE FROM items WHERE id=$id";
        return $this->conn->query($query);
    }

    public function recordSale($item_id, $user_id, $quantity) {
        $stmt = $this->conn->prepare("
            INSERT INTO sales (item_id, user_id, quantity, sale_date)
            VALUES (?, ?, ?, NOW())
        ");
        $stmt->bind_param("iii", $item_id, $user_id, $quantity);
        $stmt->execute();
        $stmt->close();

        $stmt2 = $this->conn->prepare("UPDATE items SET stok = stok - ? WHERE id = ?");
        $stmt2->bind_param("ii", $quantity, $item_id);
        $stmt2->execute();
        $stmt2->close();
    }


    public function reduceStock($item_id, $quantity) {
        $query = "UPDATE items SET stok = stok - ? WHERE id = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param("ii", $quantity, $item_id);
        $stmt->execute();
        $stmt->close();
    }

    public function find($id) {
        $query = "SELECT * FROM items WHERE id=$id";
        $result = $this->conn->query($query);
        return $result->fetch_assoc();
    }
        public function getTotalSold($item_id) {
        $query = "SELECT SUM(quantity) AS total_sold FROM sales WHERE item_id = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param("i", $item_id);
        $stmt->execute();
        $result = $stmt->get_result();
        $data = $result->fetch_assoc();
        return $data['total_sold'] ?? 0;
    }

}
?>
