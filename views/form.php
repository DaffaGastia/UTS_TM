<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= isset($item) ? 'Edit' : 'Tambah' ?> Item</title>
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
            width: 500px;
            height: 500px;
            background: rgba(255, 255, 255, 0.1);
            border-radius: 50%;
            top: -200px;
            right: -200px;
            animation: float 6s ease-in-out infinite;
        }

        body::after {
            content: '';
            position: absolute;
            width: 400px;
            height: 400px;
            background: rgba(255, 255, 255, 0.08);
            border-radius: 50%;
            bottom: -150px;
            left: -150px;
            animation: float 8s ease-in-out infinite reverse;
        }

        @keyframes float {
            0%, 100% { transform: translateY(0) rotate(0deg); }
            50% { transform: translateY(-20px) rotate(5deg); }
        }

        .form-container {
            background: white;
            border-radius: 24px;
            box-shadow: 0 25px 80px rgba(0, 0, 0, 0.35);
            overflow: hidden;
            width: 100%;
            max-width: 550px;
            animation: slideIn 0.6s cubic-bezier(0.34, 1.56, 0.64, 1);
            position: relative;
            z-index: 1;
        }

        @keyframes slideIn {
            from {
                opacity: 0;
                transform: translateY(-40px) scale(0.95);
            }
            to {
                opacity: 1;
                transform: translateY(0) scale(1);
            }
        }

        .form-header {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            padding: 45px 35px;
            text-align: center;
            color: white;
            position: relative;
            overflow: hidden;
        }

        .form-header::before {
            content: '';
            position: absolute;
            top: -50%;
            left: -50%;
            width: 200%;
            height: 200%;
            background: radial-gradient(circle, rgba(255, 255, 255, 0.1) 0%, transparent 70%);
            animation: pulse 4s ease-in-out infinite;
        }

        @keyframes pulse {
            0%, 100% { transform: scale(1); opacity: 0.5; }
            50% { transform: scale(1.2); opacity: 0.8; }
        }

        .form-header h2 {
            font-size: 32px;
            margin-bottom: 12px;
            font-weight: 700;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 15px;
            position: relative;
            z-index: 1;
            text-shadow: 0 2px 10px rgba(0, 0, 0, 0.2);
        }

        .header-icon {
            font-size: 40px;
            animation: bounce 2s ease-in-out infinite;
        }

        @keyframes bounce {
            0%, 100% { transform: translateY(0); }
            50% { transform: translateY(-8px); }
        }

        .form-header p {
            font-size: 15px;
            opacity: 0.95;
            position: relative;
            z-index: 1;
            font-weight: 400;
        }

        .form-body {
            padding: 45px 35px;
            background: linear-gradient(to bottom, #ffffff 0%, #f8f9fa 100%);
        }

        .form-group {
            margin-bottom: 28px;
            animation: fadeIn 0.5s ease-out forwards;
            opacity: 0;
        }

        .form-group:nth-child(1) { animation-delay: 0.1s; }
        .form-group:nth-child(2) { animation-delay: 0.2s; }
        .form-group:nth-child(3) { animation-delay: 0.3s; }

        @keyframes fadeIn {
            to {
                opacity: 1;
                transform: translateY(0);
            }
            from {
                opacity: 0;
                transform: translateY(10px);
            }
        }

        .form-group label {
            display: flex;
            align-items: center;
            gap: 8px;
            margin-bottom: 10px;
            color: #2c3e50;
            font-weight: 600;
            font-size: 15px;
        }

        .form-group label .label-icon {
            font-size: 18px;
        }

        .form-group label span.required {
            color: #e74c3c;
            margin-left: 2px;
            font-size: 16px;
        }

        .input-wrapper {
            position: relative;
        }

        .form-group input,
        .form-group textarea {
            width: 100%;
            padding: 16px 18px;
            border: 2px solid #e1e8ed;
            border-radius: 12px;
            font-size: 15px;
            transition: all 0.3s ease;
            outline: none;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: white;
        }

        .form-group input:hover {
            border-color: #cbd5e0;
        }

        .form-group input:focus,
        .form-group textarea:focus {
            border-color: #667eea;
            box-shadow: 0 0 0 4px rgba(102, 126, 234, 0.12);
            background: white;
            transform: translateY(-1px);
        }

        .input-prefix {
            position: relative;
        }

        .input-prefix input {
            padding-left: 50px;
            font-weight: 600;
            color: #2c3e50;
        }

        .input-prefix::before {
            content: 'Rp';
            position: absolute;
            left: 18px;
            top: 50%;
            transform: translateY(-50%);
            color: #667eea;
            font-weight: 700;
            font-size: 16px;
            z-index: 1;
        }

        .input-icon {
            position: absolute;
            right: 16px;
            top: 50%;
            transform: translateY(-50%);
            font-size: 20px;
            color: #cbd5e0;
            pointer-events: none;
            transition: all 0.3s ease;
        }

        .form-group input:focus ~ .input-icon {
            color: #667eea;
            transform: translateY(-50%) scale(1.1);
        }

        .form-actions {
            display: flex;
            gap: 15px;
            margin-top: 35px;
            animation: fadeIn 0.5s ease-out 0.4s forwards;
            opacity: 0;
        }

        .btn {
            flex: 1;
            padding: 16px;
            border: none;
            border-radius: 12px;
            font-size: 16px;
            font-weight: 700;
            cursor: pointer;
            transition: all 0.3s cubic-bezier(0.34, 1.56, 0.64, 1);
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
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
            background: rgba(255, 255, 255, 0.3);
            transform: translate(-50%, -50%);
            transition: width 0.6s, height 0.6s;
        }

        .btn:hover::before {
            width: 300px;
            height: 300px;
        }

        .btn-submit {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            box-shadow: 0 8px 20px rgba(102, 126, 234, 0.35);
        }

        .btn-submit:hover {
            transform: translateY(-3px);
            box-shadow: 0 12px 30px rgba(102, 126, 234, 0.5);
        }

        .btn-submit:active {
            transform: translateY(-1px);
        }

        .btn-cancel {
            background: linear-gradient(135deg, #f5f7fa 0%, #c3cfe2 100%);
            color: #5a6c7d;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
        }

        .btn-cancel:hover {
            transform: translateY(-3px);
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.15);
            background: linear-gradient(135deg, #e9ecef 0%, #b8c5d6 100%);
        }

        .input-info {
            font-size: 13px;
            color: #8492a6;
            margin-top: 8px;
            display: flex;
            align-items: center;
            gap: 6px;
            padding-left: 4px;
        }

        .input-info::before {
            content: '💡';
            font-size: 14px;
        }

        .alert {
            padding: 16px 18px;
            border-radius: 12px;
            margin-bottom: 25px;
            font-size: 14px;
            display: flex;
            align-items: center;
            gap: 12px;
            animation: slideDown 0.5s ease-out;
            font-weight: 500;
        }

        @keyframes slideDown {
            from {
                opacity: 0;
                transform: translateY(-20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .alert-success {
            background: linear-gradient(135deg, #d4edda 0%, #c3e6cb 100%);
            color: #155724;
            border-left: 5px solid #28a745;
            box-shadow: 0 4px 15px rgba(40, 167, 69, 0.2);
        }

        .alert-success span {
            font-size: 20px;
        }

        .alert-error {
            background: linear-gradient(135deg, #f8d7da 0%, #f5c6cb 100%);
            color: #721c24;
            border-left: 5px solid #dc3545;
            box-shadow: 0 4px 15px rgba(220, 53, 69, 0.2);
        }

        .alert-error span {
            font-size: 20px;
        }

        @media (max-width: 480px) {
            .form-container {
                margin: 10px;
                border-radius: 20px;
            }
            
            .form-header {
                padding: 35px 25px;
            }

            .form-header h2 {
                font-size: 26px;
            }

            .header-icon {
                font-size: 34px;
            }

            .form-body {
                padding: 35px 25px;
            }

            .form-actions {
                flex-direction: column;
            }

            .btn {
                width: 100%;
            }
        }

        input[type="number"]::-webkit-inner-spin-button,
        input[type="number"]::-webkit-outer-spin-button {
            opacity: 1;
            height: 40px;
        }
    </style>
</head>
<body>
    <div class="form-container">
        <div class="form-header">
            <h2>
                <span class="header-icon"><?= isset($item) ? '✏️' : '🚗' ?></span>
                <?= isset($item) ? 'Edit Item' : 'Tambah Mobil Baru' ?>
            </h2>
            <p><?= isset($item) ? 'Perbarui informasi item dengan data terbaru' : 'Lengkapi form di bawah untuk menambahkan mobil baru' ?></p>
        </div>
        
        <div class="form-body">
            <?php if (isset($_SESSION['success'])): ?>
                <div class="alert alert-success">
                    <span>✅</span>
                    <?php 
                    echo $_SESSION['success']; 
                    unset($_SESSION['success']);
                    ?>
                </div>
            <?php endif; ?>

            <?php if (isset($_SESSION['error'])): ?>
                <div class="alert alert-error">
                    <span>❌</span>
                    <?php 
                    echo $_SESSION['error']; 
                    unset($_SESSION['error']);
                    ?>
                </div>
            <?php endif; ?>
            
            <form method="POST" action="index.php?controller=item&action=<?= isset($item) ? 'update&id='.$item['id'] : 'store' ?>" id="itemForm">
                <div class="form-group">
                    <label for="nama">
                        <span class="label-icon">🏷️</span>
                        Nama Item
                        <span class="required">*</span>
                    </label>
                    <div class="input-wrapper">
                        <input 
                            type="text" 
                            id="nama" 
                            name="nama" 
                            value="<?= htmlspecialchars($item['nama'] ?? '') ?>" 
                            placeholder="Contoh: BMW M5 Competition"
                            required 
                            autofocus
                        >
                        <span class="input-icon">📝</span>
                    </div>
                    <div class="input-info">Masukkan nama item yang jelas dan deskriptif</div>
                </div>
                
                <div class="form-group">
                    <label for="harga">
                        <span class="label-icon">💰</span>
                        Harga
                        <span class="required">*</span>
                    </label>
                    <div class="input-wrapper">
                        <div class="input-prefix">
                            <input 
                                type="number" 
                                id="harga" 
                                name="harga" 
                                value="<?= $item['harga'] ?? '' ?>" 
                                placeholder="0"
                                min="0"
                                step="1000"
                                required
                            >
                        </div>
                        <span class="input-icon">💵</span>
                    </div>
                    <div class="input-info">Masukkan harga dalam Rupiah (tanpa titik atau koma)</div>
                </div>

                <div class="form-group">
                    <label for="stok">
                        <span class="label-icon">📦</span>
                        Stok Tersedia
                        <span class="required">*</span>
                    </label>
                    <div class="input-wrapper">
                        <input 
                            type="number" 
                            id="stok" 
                            name="stok" 
                            value="<?= $item['stok'] ?? 0 ?>" 
                            min="0"
                            placeholder="Jumlah stok tersedia"
                            required
                        >
                        <span class="input-icon">📊</span>
                    </div>
                    <div class="input-info">Masukkan jumlah unit yang tersedia saat ini</div>
                </div>
                
                <div class="form-actions">
                    <button type="submit" class="btn btn-submit">
                        <span>💾</span>
                        <?= isset($item) ? 'Update Item' : 'Simpan Item' ?>
                    </button>
                    <a href="index.php?controller=item&action=index" class="btn btn-cancel">
                        <span>↩️</span>
                        Batal
                    </a>
                </div>
            </form>
        </div>
    </div>

    <script>
        const hargaInput = document.getElementById('harga');
        
        hargaInput.addEventListener('blur', function() {
            if (this.value) {
                const value = Math.round(parseFloat(this.value) / 1000) * 1000;
                this.value = value;
            }
        });

        hargaInput.addEventListener('input', function() {
            this.value = this.value.replace(/[^0-9]/g, '');
        });

        document.getElementById('itemForm').addEventListener('submit', function(e) {
            const nama = document.getElementById('nama').value.trim();
            const harga = document.getElementById('harga').value;
            const stok = document.getElementById('stok').value;

            if (nama === '') {
                e.preventDefault();
                alert('❌ Nama item tidak boleh kosong!');
                document.getElementById('nama').focus();
                return false;
            }

            if (harga === '' || parseFloat(harga) <= 0) {
                e.preventDefault();
                alert('❌ Harga harus lebih dari 0!');
                document.getElementById('harga').focus();
                return false;
            }

            if (stok === '' || parseFloat(stok) < 0) {
                e.preventDefault();
                alert('❌ Stok tidak boleh negatif!');
                document.getElementById('stok').focus();
                return false;
            }
        });

        document.querySelectorAll('input').forEach(input => {
            input.addEventListener('focus', function() {
                this.parentElement.style.transform = 'scale(1.01)';
            });
            
            input.addEventListener('blur', function() {
                this.parentElement.style.transform = 'scale(1)';
            });
        });
    </script>
</body>
</html>