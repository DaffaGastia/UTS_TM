<!DOCTYPE html>
<html>
<head>
    <title>Beli Barang</title>
</head>
<body>
    <h2>Beli Barang</h2>

    <p><b>Nama Barang:</b> <?= htmlspecialchars($item['nama']) ?></p>
    <p><b>Harga Satuan:</b> Rp <?= number_format($item['harga'], 0, ',', '.') ?></p>
    <p><b>Stok Tersedia:</b> <?= $item['stok'] ?></p>

    <form method="POST">
        <label>Jumlah yang dibeli:</label>
        <input type="number" name="quantity" min="1" max="<?= $item['stok'] ?>" required>
        <br><br>
        <button type="submit">Beli Sekarang</button>
        <a href="index.php?controller=item&action=index">Batal</a>
    </form>
</body>
</html>
