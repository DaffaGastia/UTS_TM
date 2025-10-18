<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>List Mobil - Dashboard</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            min-height: 100vh;
            padding: 20px;
            position: relative;
            overflow-x: hidden;
        }

        body::before {
            content: '';
            position: fixed;
            width: 800px;
            height: 800px;
            background: radial-gradient(circle, rgba(255, 255, 255, 0.1) 0%, transparent 70%);
            top: -400px;
            right: -400px;
            border-radius: 50%;
            animation: float 15s ease-in-out infinite;
            pointer-events: none;
        }

        body::after {
            content: '';
            position: fixed;
            width: 600px;
            height: 600px;
            background: radial-gradient(circle, rgba(255, 255, 255, 0.08) 0%, transparent 70%);
            bottom: -300px;
            left: -300px;
            border-radius: 50%;
            animation: float 20s ease-in-out infinite reverse;
            pointer-events: none;
        }

        @keyframes float {
            0%, 100% { transform: translate(0, 0) rotate(0deg); }
            33% { transform: translate(50px, -50px) rotate(10deg); }
            66% { transform: translate(-30px, 30px) rotate(-10deg); }
        }

        .navbar {
            background: rgba(255, 255, 255, 0.98);
            backdrop-filter: blur(20px);
            border-radius: 20px;
            padding: 20px 35px;
            margin-bottom: 25px;
            box-shadow: 0 10px 40px rgba(0, 0, 0, 0.15);
            display: flex;
            justify-content: space-between;
            align-items: center;
            flex-wrap: wrap;
            gap: 20px;
            max-width: 1400px;
            margin: 0 auto 25px;
            animation: slideDown 0.6s cubic-bezier(0.34, 1.56, 0.64, 1);
            border: 1px solid rgba(255, 255, 255, 0.5);
        }

        @keyframes slideDown {
            from {
                opacity: 0;
                transform: translateY(-30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .navbar-brand {
            display: flex;
            align-items: center;
            gap: 15px;
            font-size: 26px;
            font-weight: 800;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        .navbar-brand-icon {
            width: 55px;
            height: 55px;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            border-radius: 16px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 28px;
            box-shadow: 0 8px 25px rgba(102, 126, 234, 0.4);
            animation: bounce 2s ease-in-out infinite;
            position: relative;
            overflow: hidden;
        }

        .navbar-brand-icon::before {
            content: '';
            position: absolute;
            top: -50%;
            left: -50%;
            width: 200%;
            height: 200%;
            background: linear-gradient(45deg, transparent, rgba(255, 255, 255, 0.3), transparent);
            transform: rotate(45deg);
            animation: shine 3s ease-in-out infinite;
        }

        @keyframes bounce {
            0%, 100% { transform: translateY(0); }
            50% { transform: translateY(-5px); }
        }

        @keyframes shine {
            0% { transform: translateX(-100%) rotate(45deg); }
            100% { transform: translateX(100%) rotate(45deg); }
        }

        .navbar-menu {
            display: flex;
            gap: 12px;
            align-items: center;
            flex-wrap: wrap;
        }

        .nav-link {
            padding: 12px 20px;
            text-decoration: none;
            border-radius: 12px;
            font-size: 14px;
            font-weight: 700;
            transition: all 0.4s cubic-bezier(0.34, 1.56, 0.64, 1);
            display: inline-flex;
            align-items: center;
            gap: 8px;
            position: relative;
            overflow: hidden;
        }

        .nav-link::before {
            content: '';
            position: absolute;
            top: 50%;
            left: 50%;
            width: 0;
            height: 0;
            border-radius: 50%;
            background: rgba(255, 255, 255, 0.4);
            transform: translate(-50%, -50%);
            transition: width 0.6s, height 0.6s;
        }

        .nav-link:hover::before {
            width: 300px;
            height: 300px;
        }

        .nav-link span {
            position: relative;
            z-index: 1;
        }

        .nav-link-add {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            box-shadow: 0 6px 20px rgba(102, 126, 234, 0.4);
        }

        .nav-link-add:hover {
            transform: translateY(-3px);
            box-shadow: 0 10px 30px rgba(102, 126, 234, 0.5);
        }

        .nav-link-profile {
            background: linear-gradient(135deg, #42a5f5 0%, #1976d2 100%);
            color: white;
            box-shadow: 0 6px 20px rgba(33, 150, 243, 0.3);
        }

        .nav-link-profile:hover {
            transform: translateY(-3px);
            box-shadow: 0 10px 30px rgba(33, 150, 243, 0.5);
        }

        .nav-link-logout {
            background: linear-gradient(135deg, #ef5350 0%, #c62828 100%);
            color: white;
            box-shadow: 0 6px 20px rgba(244, 67, 54, 0.3);
        }

        .nav-link-logout:hover {
            transform: translateY(-3px);
            box-shadow: 0 10px 30px rgba(244, 67, 54, 0.5);
        }

        .container {
            max-width: 1400px;
            margin: 0 auto;
            background: rgba(255, 255, 255, 0.98);
            backdrop-filter: blur(20px);
            border-radius: 24px;
            box-shadow: 0 30px 90px rgba(0, 0, 0, 0.3);
            overflow: hidden;
            animation: slideIn 0.7s cubic-bezier(0.34, 1.56, 0.64, 1);
            border: 1px solid rgba(255, 255, 255, 0.5);
        }

        @keyframes slideIn {
            from {
                opacity: 0;
                transform: translateY(40px) scale(0.95);
            }
            to {
                opacity: 1;
                transform: translateY(0) scale(1);
            }
        }

        .header {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            padding: 40px 45px;
            color: white;
            position: relative;
            overflow: hidden;
        }

        .header::before {
            content: '';
            position: absolute;
            top: -50%;
            left: -50%;
            width: 200%;
            height: 200%;
            background: repeating-linear-gradient(
                45deg,
                transparent,
                transparent 15px,
                rgba(255, 255, 255, 0.03) 15px,
                rgba(255, 255, 255, 0.03) 30px
            );
            animation: slide 30s linear infinite;
        }

        @keyframes slide {
            0% { transform: translate(0, 0); }
            100% { transform: translate(50px, 50px); }
        }

        .header h2 {
            font-size: 32px;
            font-weight: 800;
            display: flex;
            align-items: center;
            gap: 15px;
            position: relative;
            z-index: 1;
            text-shadow: 0 3px 15px rgba(0, 0, 0, 0.2);
        }

        .header-icon {
            font-size: 40px;
            animation: pulse 2s ease-in-out infinite;
        }

        @keyframes pulse {
            0%, 100% { transform: scale(1); }
            50% { transform: scale(1.1); }
        }

        .content {
            padding: 45px;
        }

        .stats-overview {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 20px;
            margin-bottom: 35px;
            animation: fadeIn 0.6s ease-out 0.3s both;
        }

        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }

        .stat-card {
            background: linear-gradient(135deg, #f8f9ff 0%, #eef1ff 100%);
            padding: 25px;
            border-radius: 18px;
            border: 2px solid #e8ebff;
            transition: all 0.4s ease;
            position: relative;
            overflow: hidden;
        }

        .stat-card::before {
            content: '';
            position: absolute;
            top: -50%;
            right: -50%;
            width: 200%;
            height: 200%;
            background: radial-gradient(circle, rgba(102, 126, 234, 0.1) 0%, transparent 70%);
            transition: all 0.5s ease;
        }

        .stat-card:hover {
            transform: translateY(-8px);
            box-shadow: 0 15px 40px rgba(102, 126, 234, 0.25);
            border-color: #667eea;
        }

        .stat-card:hover::before {
            top: 0;
            right: 0;
        }

        .stat-card-content {
            position: relative;
            z-index: 1;
        }

        .stat-icon {
            font-size: 38px;
            margin-bottom: 12px;
            display: inline-block;
        }

        .stat-label {
            font-size: 13px;
            color: #8492a6;
            text-transform: uppercase;
            letter-spacing: 1px;
            font-weight: 700;
            margin-bottom: 8px;
        }

        .stat-value {
            font-size: 32px;
            color: #667eea;
            font-weight: 800;
        }

        .search-filter-bar {
            background: linear-gradient(135deg, #f8f9ff 0%, #eef1ff 100%);
            padding: 25px;
            border-radius: 18px;
            margin-bottom: 30px;
            display: flex;
            gap: 20px;
            flex-wrap: wrap;
            align-items: center;
            border: 2px solid #e8ebff;
            animation: fadeIn 0.6s ease-out 0.5s both;
        }

        .search-box {
            flex: 1;
            min-width: 280px;
            position: relative;
        }

        .search-box input {
            width: 100%;
            padding: 16px 20px 16px 55px;
            border: 2px solid #e0e6ed;
            border-radius: 14px;
            font-size: 15px;
            outline: none;
            transition: all 0.3s ease;
            background: white;
            font-weight: 500;
        }

        .search-box input:focus {
            border-color: #667eea;
            box-shadow: 0 0 0 4px rgba(102, 126, 234, 0.12);
            transform: translateY(-2px);
        }

        .search-box::before {
            content: '🔍';
            position: absolute;
            left: 20px;
            top: 50%;
            transform: translateY(-50%);
            font-size: 20px;
            z-index: 1;
        }

        .filter-info {
            display: flex;
            align-items: center;
            gap: 10px;
            padding: 12px 20px;
            background: white;
            border-radius: 12px;
            font-size: 14px;
            color: #666;
            font-weight: 700;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.05);
        }

        .filter-info strong {
            color: #667eea;
            font-size: 18px;
        }

        .table-wrapper {
            overflow-x: auto;
            border-radius: 18px;
            box-shadow: 0 8px 30px rgba(0, 0, 0, 0.08);
            animation: fadeIn 0.6s ease-out 0.7s both;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            background: white;
        }

        thead {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
        }

        th {
            padding: 20px 18px;
            text-align: left;
            font-weight: 700;
            font-size: 13px;
            text-transform: uppercase;
            letter-spacing: 1px;
            position: relative;
        }

        th::after {
            content: '';
            position: absolute;
            right: 0;
            top: 25%;
            height: 50%;
            width: 1px;
            background: rgba(255, 255, 255, 0.2);
        }

        th:last-child::after {
            display: none;
        }

        td {
            padding: 20px 18px;
            border-bottom: 1px solid #f5f5f8;
            font-size: 15px;
            color: #2c3e50;
            font-weight: 500;
        }

        tr:last-child td {
            border-bottom: none;
        }

        tbody tr {
            transition: all 0.3s ease;
        }

        tbody tr:hover {
            background: linear-gradient(135deg, #f8f9ff 0%, #f0f3ff 100%);
            transform: scale(1.01);
            box-shadow: 0 4px 15px rgba(102, 126, 234, 0.1);
        }

        .action-buttons {
            display: flex;
            gap: 8px;
            flex-wrap: wrap;
        }

        .btn {
            padding: 10px 18px;
            text-decoration: none;
            border-radius: 10px;
            font-size: 13px;
            font-weight: 700;
            transition: all 0.4s cubic-bezier(0.34, 1.56, 0.64, 1);
            display: inline-flex;
            align-items: center;
            gap: 6px;
            border: none;
            cursor: pointer;
            position: relative;
            overflow: hidden;
        }

        .btn::before {
            content: '';
            position: absolute;
            top: 50%;
            left: 50%;
            width: 0;
            height: 0;
            border-radius: 50%;
            background: rgba(255, 255, 255, 0.4);
            transform: translate(-50%, -50%);
            transition: width 0.6s, height 0.6s;
        }

        .btn:hover::before {
            width: 300px;
            height: 300px;
        }

        .btn span {
            position: relative;
            z-index: 1;
        }

        .btn-detail {
            background: linear-gradient(135deg, #66bb6a 0%, #43a047 100%);
            color: white;
            box-shadow: 0 4px 12px rgba(76, 175, 80, 0.3);
        }

        .btn-detail:hover {
            transform: translateY(-3px);
            box-shadow: 0 8px 20px rgba(76, 175, 80, 0.4);
        }

        .btn-edit {
            background: linear-gradient(135deg, #42a5f5 0%, #1976d2 100%);
            color: white;
            box-shadow: 0 4px 12px rgba(33, 150, 243, 0.3);
        }

        .btn-edit:hover {
            transform: translateY(-3px);
            box-shadow: 0 8px 20px rgba(33, 150, 243, 0.4);
        }

        .btn-delete {
            background: linear-gradient(135deg, #ef5350 0%, #c62828 100%);
            color: white;
            box-shadow: 0 4px 12px rgba(244, 67, 54, 0.3);
        }

        .btn-delete:hover {
            transform: translateY(-3px);
            box-shadow: 0 8px 20px rgba(244, 67, 54, 0.4);
        }

        .btn-sell {
            background: linear-gradient(135deg, #ab47bc 0%, #7b1fa2 100%);
            color: white;
            box-shadow: 0 4px 12px rgba(156, 39, 176, 0.3);
        }

        .btn-sell:hover {
            transform: translateY(-3px);
            box-shadow: 0 8px 20px rgba(156, 39, 176, 0.4);
        }

        .empty-state {
            text-align: center;
            padding: 80px 30px;
            color: #999;
            animation: fadeIn 0.6s ease-out;
        }

        .empty-state-icon {
            font-size: 80px;
            margin-bottom: 25px;
            opacity: 0.6;
            animation: bounce 2s ease-in-out infinite;
        }

        .empty-state p {
            font-size: 20px;
            margin-bottom: 25px;
            font-weight: 600;
            color: #666;
        }

        .price {
            font-weight: 700;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            font-size: 16px;
        }

        .badge-id {
            background: linear-gradient(135deg, #e3f2fd 0%, #bbdefb 100%);
            color: #1976d2;
            padding: 6px 14px;
            border-radius: 20px;
            font-size: 12px;
            font-weight: 700;
            box-shadow: 0 2px 8px rgba(33, 150, 243, 0.2);
        }

        .stock-badge {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            padding: 6px 14px;
            border-radius: 20px;
            font-size: 13px;
            font-weight: 700;
        }

        .stock-low {
            background: linear-gradient(135deg, #ffebee 0%, #ffcdd2 100%);
            color: #c62828;
        }

        .stock-medium {
            background: linear-gradient(135deg, #fff8e1 0%, #ffe082 100%);
            color: #f57c00;
        }

        .stock-high {
            background: linear-gradient(135deg, #e8f5e9 0%, #c8e6c9 100%);
            color: #2e7d32;
        }

        @media (max-width: 768px) {
            body {
                padding: 15px;
            }

            .navbar {
                padding: 18px 22px;
            }

            .navbar-brand {
                font-size: 22px;
            }

            .navbar-brand-icon {
                width: 50px;
                height: 50px;
                font-size: 24px;
            }

            .navbar-menu {
                width: 100%;
                justify-content: space-between;
            }

            .nav-link {
                font-size: 12px;
                padding: 10px 14px;
            }

            .header {
                padding: 30px 25px;
            }

            .header h2 {
                font-size: 26px;
            }

            .content {
                padding: 30px 25px;
            }

            .stats-overview {
                grid-template-columns: 1fr;
            }

            .search-filter-bar {
                flex-direction: column;
                padding: 20px;
            }

            .search-box {
                width: 100%;
            }

            .table-wrapper {
                border-radius: 14px;
            }

            th, td {
                padding: 14px 12px;
                font-size: 13px;
            }

            .action-buttons {
                flex-direction: column;
            }

            .btn {
                width: 100%;
                justify-content: center;
            }
        }

        @media (max-width: 480px) {
            .container {
                border-radius: 20px;
            }

            .stat-value {
                font-size: 26px;
            }

            table {
                font-size: 12px;
            }
        }
    </style>
</head>
<body>
    <nav class="navbar">
        <div class="navbar-brand">
            <div class="navbar-brand-icon">🏎️</div>
            <span>Jual Beli Mobil Bekas</span>
        </div>
        <div class="navbar-menu">
            <?php if ($_SESSION['role'] === 'admin'): ?>
                <a href="index.php?controller=item&action=form" class="nav-link nav-link-add">
                    <span>➕</span> <span>Tambah Mobil</span>
                </a>
            <?php endif; ?>
            <a href="index.php?controller=auth&action=profile" class="nav-link nav-link-profile">
                <span>👤</span> <span>Profil</span>
            </a>
            <a href="index.php?controller=auth&action=logout" class="nav-link nav-link-logout" onclick="return confirm('Yakin ingin logout?')">
                <span>🚪</span> <span>Logout</span>
            </a>
        </div>
    </nav>

    <div class="container">
        <div class="header">
            <h2>
                <span class="header-icon">🚘</span> Dashboard Mobil
            </h2>
        </div>
        
        <div class="content">
            <div class="stats-overview">
                <div class="stat-card">
                    <div class="stat-card-content">
                        <div class="stat-icon">🚗</div>
                        <div class="stat-label">Total Mobil</div>
                        <div class="stat-value"><?= $items->num_rows ?></div>
                    </div>
                </div>
                <div class="stat-card">
                    <div class="stat-card-content">
                        <div class="stat-icon">📦</div>
                        <div class="stat-label">Stok Tersedia</div>
                        <div class="stat-value"><?php 
                            $totalStock = 0;
                            $items->data_seek(0);
                            while($row = $items->fetch_assoc()) {
                                $totalStock += $row['stok'];
                            }
                            echo $totalStock;
                            $items->data_seek(0);
                        ?></div>
                    </div>
                </div>
                <?php if ($_SESSION['role'] === 'admin'): ?>
                <div class="stat-card">
                    <div class="stat-card-content">
                        <div class="stat-icon">💰</div>
                        <div class="stat-label">Total Terjual</div>
                        <div class="stat-value"><?= array_sum($salesData ?? []) ?></div>
                    </div>
                </div>
                <?php endif; ?>
            </div>

            <div class="search-filter-bar">
                <div class="search-box">
                    <input type="text" id="searchInput" placeholder="Cari mobil berdasarkan nama..." onkeyup="searchTable()">
                </div>
                <div class="filter-info">
                    <span>📊</span>
                    Menampilkan: <strong id="totalItems"><?= $items->num_rows ?></strong> mobil
                </div>
            </div>

            <?php if ($items->num_rows > 0): ?>
                <div class="table-wrapper">
                    <table id="itemTable">
                        <thead>
                            <tr>
                                <th>Nama Mobil</th>
                                <th>Harga</th>
                                <th>Stok</th>
                                <?php if ($_SESSION['role'] === 'admin'): ?>
                                    <th>Terjual</th>
                                <?php endif; ?>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php while ($row = $items->fetch_assoc()): ?>
                                <tr>
                                    <td><strong><?= htmlspecialchars($row['nama']) ?></strong></td>
                                    <td>
                                        <span class="price">Rp <?= number_format($row['harga'], 0, ',', '.') ?></span>
                                    </td>
                                    <td>
                                        <span class="stock-badge <?= $row['stok'] <= 2 ? 'stock-low' : ($row['stok'] <= 5 ? 'stock-medium' : 'stock-high') ?>">
                                            <?= $row['stok'] ?> unit
                                        </span>
                                    </td>
                                    <?php if ($_SESSION['role'] === 'admin'): ?>
                                        <td>
                                            <strong style="color: #667eea; font-size: 16px;"><?= $salesData[$row['id']] ?? 0 ?> unit</strong>
                                        </td>
                                    <?php endif; ?>
                                    <td>
                                        <div class="action-buttons">
                                        <?php if ($_SESSION['role'] === 'admin'): ?>
                                            <a href="index.php?controller=item&action=detail&id=<?= $row['id'] ?>" class="btn btn-detail"><span>👁️ Detail</span></a>
                                            <a href="index.php?controller=item&action=form&id=<?= $row['id'] ?>" class="btn btn-edit"><span>✏️ Edit</span></a>
                                            <a href="index.php?controller=item&action=delete&id=<?= $row['id'] ?>" class="btn btn-delete" onclick="return confirm('⚠️ Konfirmasi Penghapusan\n\n🚗 Mobil: <?= htmlspecialchars($row['nama']) ?>\n💰 Harga: Rp <?= number_format($row['harga'], 0, ',', '.') ?>\n📦 Stok: <?= $row['stok'] ?> unit\n\nYakin ingin menghapus mobil ini?')"><span>🗑️ Hapus</span></a>
                                        <?php else: ?>
                                            <a href="index.php?controller=item&action=buy&id=<?= $row['id'] ?>" class="btn btn-sell"><span>🛒 Beli Sekarang</span></a>
                                        <?php endif; ?>
                                        </div>
                                    </td>
                                </tr>
                            <?php endwhile; ?>
                        </tbody>
                    </table>
                </div>
            <?php else: ?>
                <div class="empty-state">
                    <div class="empty-state-icon">📭</div>
                    <p>Belum ada mobil tersedia</p>
                    <?php if ($_SESSION['role'] === 'admin'): ?>
                    <a href="index.php?controller=item&action=form" class="nav-link nav-link-add" style="display: inline-flex;">
                        <span>➕</span> <span>Tambah Mobil Pertama</span>
                    </a>
                    <?php endif; ?>
                </div>
            <?php endif; ?>
        </div>
    </div>

    <script>
        function searchTable() {
            const input = document.getElementById('searchInput');
            const filter = input.value.toLowerCase();
            const table = document.getElementById('itemTable');
            const tbody = table.getElementsByTagName('tbody')[0];
            const tr = tbody.getElementsByTagName('tr');
            let visibleCount = 0;

            for (let i = 0; i < tr.length; i++) {
                const td = tr[i].getElementsByTagName('td')[0];
                if (td) {
                    const txtValue = td.textContent || td.innerText;
                    if (txtValue.toLowerCase().indexOf(filter) > -1) {
                        tr[i].style.display = '';
                        visibleCount++;
                    } else {
                        tr[i].style.display = 'none';
                    }
                }
            }

            document.getElementById('totalItems').textContent = visibleCount;
        }

        document.addEventListener('DOMContentLoaded', function() {
            const logoutLinks = document.querySelectorAll('.nav-link-logout');
            logoutLinks.forEach(link => {
                link.addEventListener('click', function(e) {
                    if (!confirm('⚠️ Konfirmasi Logout\n\nYakin ingin keluar dari sistem?')) {
                        e.preventDefault();
                    }
                });
            });

            const deleteLinks = document.querySelectorAll('.btn-delete');
            deleteLinks.forEach(link => {
                link.addEventListener('click', function(e) {
                    const row = this.closest('tr');
                    row.style.transition = 'all 0.3s ease';
                    row.style.opacity = '0.5';
                });
            });
        });
    </script>
</body>
</html>