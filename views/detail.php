<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Mobil - <?= htmlspecialchars($item['nama']) ?></title>
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
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 20px;
            position: relative;
            overflow-x: hidden;
        }

        body::before {
            content: '';
            position: absolute;
            width: 600px;
            height: 600px;
            background: radial-gradient(circle, rgba(255, 255, 255, 0.15) 0%, transparent 70%);
            top: -300px;
            right: -200px;
            border-radius: 50%;
            animation: float 8s ease-in-out infinite;
        }

        body::after {
            content: '';
            position: absolute;
            width: 500px;
            height: 500px;
            background: radial-gradient(circle, rgba(255, 255, 255, 0.1) 0%, transparent 70%);
            bottom: -250px;
            left: -150px;
            border-radius: 50%;
            animation: float 10s ease-in-out infinite reverse;
        }

        @keyframes float {
            0%, 100% { transform: translate(0, 0) rotate(0deg); }
            33% { transform: translate(30px, -30px) rotate(5deg); }
            66% { transform: translate(-20px, 20px) rotate(-5deg); }
        }

        .detail-container {
            background: white;
            border-radius: 28px;
            box-shadow: 0 30px 90px rgba(0, 0, 0, 0.4);
            overflow: hidden;
            width: 100%;
            max-width: 650px;
            animation: slideIn 0.7s cubic-bezier(0.34, 1.56, 0.64, 1);
            position: relative;
            z-index: 1;
        }

        @keyframes slideIn {
            from {
                opacity: 0;
                transform: translateY(-50px) scale(0.9);
            }
            to {
                opacity: 1;
                transform: translateY(0) scale(1);
            }
        }

        .detail-header {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            padding: 50px 40px 40px;
            text-align: center;
            color: white;
            position: relative;
            overflow: hidden;
        }

        .detail-header::before {
            content: '';
            position: absolute;
            top: -50%;
            left: -50%;
            width: 200%;
            height: 200%;
            background: repeating-linear-gradient(
                45deg,
                transparent,
                transparent 10px,
                rgba(255, 255, 255, 0.03) 10px,
                rgba(255, 255, 255, 0.03) 20px
            );
            animation: slide 20s linear infinite;
        }

        @keyframes slide {
            0% { transform: translate(0, 0); }
            100% { transform: translate(50px, 50px); }
        }

        .icon-large {
            width: 100px;
            height: 100px;
            background: linear-gradient(135deg, rgba(255, 255, 255, 0.25) 0%, rgba(255, 255, 255, 0.15) 100%);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 25px;
            font-size: 50px;
            backdrop-filter: blur(10px);
            border: 3px solid rgba(255, 255, 255, 0.3);
            box-shadow: 0 15px 40px rgba(0, 0, 0, 0.2);
            animation: pulse 3s ease-in-out infinite;
            position: relative;
            z-index: 1;
        }

        @keyframes pulse {
            0%, 100% { transform: scale(1); }
            50% { transform: scale(1.05); }
        }

        .detail-header h2 {
            font-size: 32px;
            margin-bottom: 12px;
            font-weight: 700;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 15px;
            position: relative;
            z-index: 1;
            text-shadow: 0 3px 15px rgba(0, 0, 0, 0.3);
            letter-spacing: -0.5px;
        }

        .detail-header p {
            font-size: 15px;
            opacity: 0.95;
            position: relative;
            z-index: 1;
            font-weight: 400;
        }

        .detail-body {
            padding: 45px 40px;
            background: linear-gradient(to bottom, #ffffff 0%, #f8f9fc 100%);
        }

        .car-name-banner {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            padding: 30px;
            border-radius: 20px;
            margin-bottom: 30px;
            text-align: center;
            box-shadow: 0 15px 40px rgba(102, 126, 234, 0.4);
            position: relative;
            overflow: hidden;
            animation: fadeIn 0.6s ease-out 0.3s both;
        }

        .car-name-banner::before {
            content: '';
            position: absolute;
            top: -50%;
            right: -50%;
            width: 200%;
            height: 200%;
            background: radial-gradient(circle, rgba(255, 255, 255, 0.1) 0%, transparent 70%);
            animation: rotate 20s linear infinite;
        }

        @keyframes rotate {
            0% { transform: rotate(0deg); }
            100% { transform: rotate(360deg); }
        }

        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }

        .car-name-banner h3 {
            font-size: 32px;
            font-weight: 800;
            position: relative;
            z-index: 1;
            text-shadow: 0 3px 15px rgba(0, 0, 0, 0.2);
            letter-spacing: -0.5px;
        }

        .info-card {
            background: white;
            border-radius: 20px;
            padding: 30px;
            margin-bottom: 25px;
            box-shadow: 0 10px 40px rgba(0, 0, 0, 0.08);
            border: 1px solid #f0f0f5;
            animation: fadeIn 0.6s ease-out 0.5s both;
        }

        .info-item {
            display: flex;
            align-items: center;
            padding: 25px 0;
            border-bottom: 2px solid #f5f5f8;
            position: relative;
            transition: all 0.3s ease;
        }

        .info-item:hover {
            transform: translateX(5px);
        }

        .info-item:last-child {
            border-bottom: none;
            padding-bottom: 0;
        }

        .info-item:first-child {
            padding-top: 0;
        }

        .info-icon {
            width: 60px;
            height: 60px;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            border-radius: 16px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 28px;
            margin-right: 25px;
            flex-shrink: 0;
            box-shadow: 0 8px 20px rgba(102, 126, 234, 0.3);
            position: relative;
            overflow: hidden;
        }

        .info-icon::before {
            content: '';
            position: absolute;
            top: -50%;
            left: -50%;
            width: 200%;
            height: 200%;
            background: linear-gradient(45deg, transparent, rgba(255, 255, 255, 0.2), transparent);
            transform: rotate(45deg);
            animation: shine 3s ease-in-out infinite;
        }

        @keyframes shine {
            0% { transform: translateX(-100%) rotate(45deg); }
            100% { transform: translateX(100%) rotate(45deg); }
        }

        .info-content {
            flex: 1;
        }

        .info-label {
            font-size: 13px;
            color: #8492a6;
            text-transform: uppercase;
            letter-spacing: 1px;
            font-weight: 700;
            margin-bottom: 8px;
            display: flex;
            align-items: center;
            gap: 6px;
        }

        .info-label::before {
            content: '';
            width: 4px;
            height: 4px;
            background: #667eea;
            border-radius: 50%;
        }

        .info-value {
            font-size: 22px;
            color: #2c3e50;
            font-weight: 700;
            word-break: break-word;
            line-height: 1.3;
        }

        .price-highlight {
            color: #667eea;
            font-size: 36px;
            font-weight: 800;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        .stats-grid {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 15px;
            margin-bottom: 25px;
            animation: fadeIn 0.6s ease-out 0.7s both;
        }

        .stat-card {
            background: linear-gradient(135deg, #f8f9ff 0%, #eef1ff 100%);
            border-radius: 16px;
            padding: 20px;
            text-align: center;
            border: 2px solid #e8ebff;
            transition: all 0.3s ease;
        }

        .stat-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 30px rgba(102, 126, 234, 0.2);
        }

        .stat-icon {
            font-size: 32px;
            margin-bottom: 10px;
        }

        .stat-label {
            font-size: 12px;
            color: #8492a6;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            font-weight: 700;
            margin-bottom: 5px;
        }

        .stat-value {
            font-size: 24px;
            color: #667eea;
            font-weight: 800;
        }

        .action-buttons {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 15px;
            margin-top: 35px;
            animation: fadeIn 0.6s ease-out 0.9s both;
        }

        .btn {
            padding: 16px 20px;
            border: none;
            border-radius: 14px;
            font-size: 15px;
            font-weight: 700;
            cursor: pointer;
            transition: all 0.4s cubic-bezier(0.34, 1.56, 0.64, 1);
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            gap: 8px;
            text-decoration: none;
            text-align: center;
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
            width: 400px;
            height: 400px;
        }

        .btn-icon {
            font-size: 28px;
            position: relative;
            z-index: 1;
        }

        .btn-text {
            font-size: 13px;
            position: relative;
            z-index: 1;
        }

        .btn-back {
            background: linear-gradient(135deg, #95a5a6 0%, #7f8c8d 100%);
            color: white;
            box-shadow: 0 6px 20px rgba(127, 140, 141, 0.3);
        }

        .btn-back:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 30px rgba(127, 140, 141, 0.4);
        }

        .btn-edit {
            background: linear-gradient(135deg, #3498db 0%, #2980b9 100%);
            color: white;
            box-shadow: 0 6px 20px rgba(52, 152, 219, 0.3);
        }

        .btn-edit:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 30px rgba(52, 152, 219, 0.5);
        }

        .btn-delete {
            background: linear-gradient(135deg, #e74c3c 0%, #c0392b 100%);
            color: white;
            box-shadow: 0 6px 20px rgba(231, 76, 60, 0.3);
        }

        .btn-delete:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 30px rgba(231, 76, 60, 0.5);
        }

        .btn:active {
            transform: translateY(-2px);
        }

        .divider {
            height: 2px;
            background: linear-gradient(90deg, transparent, #e0e0e0, transparent);
            margin: 30px 0;
        }

        @media (max-width: 768px) {
            .stats-grid {
                grid-template-columns: 1fr;
            }

            .action-buttons {
                grid-template-columns: 1fr;
            }
        }

        @media (max-width: 480px) {
            .detail-container {
                margin: 10px;
                border-radius: 24px;
            }

            .detail-header {
                padding: 40px 25px 30px;
            }

            .icon-large {
                width: 80px;
                height: 80px;
                font-size: 40px;
            }

            .detail-header h2 {
                font-size: 26px;
            }

            .detail-body {
                padding: 35px 25px;
            }

            .car-name-banner h3 {
                font-size: 24px;
            }

            .info-item {
                flex-direction: column;
                align-items: flex-start;
            }

            .info-icon {
                margin-bottom: 15px;
                margin-right: 0;
            }

            .info-value {
                font-size: 20px;
            }

            .price-highlight {
                font-size: 28px;
            }

            .action-buttons {
                grid-template-columns: 1fr;
            }
        }
    </style>
</head>

<body>
    <div class="detail-container">
        <div class="detail-header">
            <div class="icon-large">🚗</div>
            <h2>Detail Mobil</h2>
            <p>Informasi lengkap dan terperinci</p>
        </div>

        <div class="detail-body">
            <div class="car-name-banner">
                <h3><?= htmlspecialchars($item['nama']) ?></h3>
            </div>

            <div class="stats-grid">
                <div class="stat-card">
                    <div class="stat-icon">💰</div>
                    <div class="stat-label">Harga</div>
                    <div class="stat-value">Rp <?= number_format($item['harga'] / 1000000, 0) ?>jt</div>
                </div>
                <div class="stat-card">
                    <div class="stat-icon">📦</div>
                    <div class="stat-label">Stok</div>
                    <div class="stat-value"><?= $item['stok'] ?> Unit</div>
                </div>
            </div>

            <div class="info-card">
                <div class="info-item">
                    <div class="info-icon">🏷️</div>
                    <div class="info-content">
                        <div class="info-label">Nama Mobil</div>
                        <div class="info-value"><?= htmlspecialchars($item['nama']) ?></div>
                    </div>
                </div>

                <div class="info-item">
                    <div class="info-icon">💵</div>
                    <div class="info-content">
                        <div class="info-label">Harga Lengkap</div>
                        <div class="info-value price-highlight">
                            Rp <?= number_format($item['harga'], 0, ',', '.') ?>
                        </div>
                    </div>
                </div>

                <div class="info-item">
                    <div class="info-icon">📊</div>
                    <div class="info-content">
                        <div class="info-label">Stok Tersedia</div>
                        <div class="info-value"><?= $item['stok'] ?> Unit</div>
                    </div>
                </div>
            </div>

            <div class="action-buttons">
                <a href="index.php?controller=item&action=index" class="btn btn-back">
                    <span class="btn-icon">↩️</span>
                    <span class="btn-text">Kembali</span>
                </a>
                <a href="index.php?controller=item&action=form&id=<?= $item['id'] ?>" class="btn btn-edit">
                    <span class="btn-icon">✏️</span>
                    <span class="btn-text">Edit</span>
                </a>
                <a href="index.php?controller=item&action=delete&id=<?= $item['id'] ?>" class="btn btn-delete" onclick="return confirm('⚠️ Konfirmasi Penghapusan\n\n🚗 Mobil: <?= htmlspecialchars($item['nama']) ?>\n💰 Harga: Rp <?= number_format($item['harga'], 0, ',', '.') ?>\n📦 Stok: <?= $item['stok'] ?> unit\n\nYakin ingin menghapus item ini?\nTindakan ini tidak dapat dibatalkan!')">
                    <span class="btn-icon">🗑️</span>
                    <span class="btn-text">Hapus</span>
                </a>
            </div>
        </div>
    </div>
</body>

</html>