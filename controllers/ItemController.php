<?php
require_once __DIR__ . '/../models/ItemModel.php';

class ItemController {
    private $model;

    public function __construct() {
        session_start();
        $this->model = new ItemModel();

        if (!isset($_SESSION['user_id'])) {
            header("Location: index.php?controller=auth&action=loginForm");
            exit;
        }
    }

    public function index() {
        $items = $this->model->showAllItem();
        $salesData = [];

        while ($row = $items->fetch_assoc()) {
            $salesData[$row['id']] = $this->model->getTotalSold($row['id']);
        }

        $items->data_seek(0);

        include __DIR__ . '/../views/list.php';
    }


    public function form($id = null) {
        $item = null;
        if ($id) {
            $item = $this->model->find($id);
        }
        include __DIR__ . '/../views/form.php';
    }

    public function store() {
        $this->model->store($_POST);
        header("Location: index.php?controller=item&action=index");
    }

    public function update($id) {
        $this->model->update($id, $_POST);
        header("Location: index.php?controller=item&action=index");
    }

    public function delete($id) {
        $this->model->delete($id);
        header("Location: index.php?controller=item&action=index");
    }

    public function detail($id) {
        $item = $this->model->find($id);
        include __DIR__ . '/../views/detail.php';
    }

    public function buy($id) {
        $item = $this->model->find($id);

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $quantity = (int)$_POST['quantity'];
            $user_id = $_SESSION['user_id'];

            if ($quantity <= 0 || $quantity > $item['stok']) {
                echo "<script>alert('Jumlah tidak valid atau stok tidak cukup'); window.location='index.php?controller=item&action=index';</script>";
                exit;
            }

            $total_price = $item['harga'] * $quantity;

            $this->model->recordSale($id, $user_id, $quantity, $total_price);

            echo "<script>alert('Pembelian berhasil!'); window.location='index.php?controller=item&action=index';</script>";
            exit;
        } else {
            include __DIR__ . '/../views/item_buy.php';
        }
    }

}
?>
