<h2>Jual Mobil: <?= htmlspecialchars($item['nama']) ?></h2>
<form method="POST" action="">
    <label>Jumlah Terjual:</label>
    <input type="number" name="quantity" min="1" max="<?= $item['stok'] ?>" required>
    <button type="submit" class="btn btn-sell">Simpan Penjualan</button>
</form>
