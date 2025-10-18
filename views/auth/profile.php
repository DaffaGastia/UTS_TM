<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profil Akun - <?= htmlspecialchars($user['username']) ?></title>
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
            overflow-y: auto;
        }

        body::before {
            content: '';
            position: fixed;
            width: 700px;
            height: 700px;
            background: radial-gradient(circle, rgba(255, 255, 255, 0.12) 0%, transparent 70%);
            top: -350px;
            right: -300px;
            border-radius: 50%;
            animation: float 18s ease-in-out infinite;
            pointer-events: none;
        }

        body::after {
            content: '';
            position: fixed;
            width: 600px;
            height: 600px;
            background: radial-gradient(circle, rgba(255, 255, 255, 0.08) 0%, transparent 70%);
            bottom: -300px;
            left: -250px;
            border-radius: 50%;
            animation: float 22s ease-in-out infinite reverse;
            pointer-events: none;
        }

        @keyframes float {
            0%, 100% { transform: translate(0, 0) rotate(0deg); }
            33% { transform: translate(60px, -60px) rotate(12deg); }
            66% { transform: translate(-40px, 40px) rotate(-12deg); }
        }

        .profile-container {
            background: rgba(255, 255, 255, 0.98);
            backdrop-filter: blur(20px);
            border-radius: 28px;
            box-shadow: 0 30px 90px rgba(0, 0, 0, 0.4);
            overflow: hidden;
            width: 100%;
            max-width: 700px;
            animation: slideIn 0.8s cubic-bezier(0.34, 1.56, 0.64, 1);
            position: relative;
            z-index: 1;
            border: 1px solid rgba(255, 255, 255, 0.5);
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

        .profile-header {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            padding: 50px 40px;
            text-align: center;
            color: white;
            position: relative;
            overflow: hidden;
        }

        .profile-header::before {
            content: '';
            position: absolute;
            top: -50%;
            left: -50%;
            width: 200%;
            height: 200%;
            background: repeating-linear-gradient(
                45deg,
                transparent,
                transparent 18px,
                rgba(255, 255, 255, 0.03) 18px,
                rgba(255, 255, 255, 0.03) 36px
            );
            animation: slide 30s linear infinite;
        }

        @keyframes slide {
            0% { transform: translate(0, 0); }
            100% { transform: translate(60px, 60px); }
        }

        .avatar-container {
            width: 120px;
            height: 120px;
            background: linear-gradient(135deg, rgba(255, 255, 255, 0.25) 0%, rgba(255, 255, 255, 0.15) 100%);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 25px;
            font-size: 60px;
            backdrop-filter: blur(10px);
            border: 5px solid rgba(255, 255, 255, 0.3);
            box-shadow: 0 20px 50px rgba(0, 0, 0, 0.3);
            animation: pulse 3s ease-in-out infinite;
            position: relative;
            z-index: 1;
        }

        @keyframes pulse {
            0%, 100% { 
                transform: scale(1);
                box-shadow: 0 20px 50px rgba(0, 0, 0, 0.3);
            }
            50% { 
                transform: scale(1.05);
                box-shadow: 0 25px 60px rgba(0, 0, 0, 0.4);
            }
        }

        .profile-header h2 {
            font-size: 36px;
            margin-bottom: 10px;
            font-weight: 800;
            position: relative;
            z-index: 1;
            text-shadow: 0 3px 15px rgba(0, 0, 0, 0.3);
            letter-spacing: -0.5px;
        }

        .profile-header p {
            font-size: 16px;
            opacity: 0.95;
            position: relative;
            z-index: 1;
            font-weight: 400;
        }

        .role-badge {
            display: inline-block;
            background: rgba(255, 255, 255, 0.2);
            padding: 8px 20px;
            border-radius: 25px;
            font-size: 14px;
            font-weight: 700;
            margin-top: 15px;
            border: 2px solid rgba(255, 255, 255, 0.3);
            text-transform: uppercase;
            letter-spacing: 1px;
            position: relative;
            z-index: 1;
        }

        .profile-body {
            padding: 45px 40px;
            background: linear-gradient(to bottom, #ffffff 0%, #f8f9fc 100%);
        }

        .security-notice {
            background: linear-gradient(135deg, #fff8e1 0%, #ffecb3 100%);
            border-left: 5px solid #ffa000;
            padding: 20px;
            border-radius: 14px;
            margin-bottom: 30px;
            font-size: 14px;
            color: #663c00;
            display: flex;
            align-items: flex-start;
            gap: 15px;
            box-shadow: 0 4px 15px rgba(255, 160, 0, 0.15);
            animation: fadeIn 0.6s ease-out 0.2s both;
        }

        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }

        .security-notice-icon {
            font-size: 28px;
            flex-shrink: 0;
            animation: bounce 2s ease-in-out infinite;
        }

        @keyframes bounce {
            0%, 100% { transform: translateY(0); }
            50% { transform: translateY(-5px); }
        }

        .security-notice strong {
            display: block;
            margin-bottom: 5px;
            font-size: 15px;
        }

        .stats-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 20px;
            margin-bottom: 30px;
            animation: fadeIn 0.6s ease-out 0.4s both;
        }

        .stat-card {
            background: white;
            border: 2px solid #e8ebff;
            border-radius: 18px;
            padding: 25px;
            text-align: center;
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
            background: radial-gradient(circle, rgba(102, 126, 234, 0.08) 0%, transparent 70%);
            transition: all 0.5s ease;
        }

        .stat-card:hover {
            transform: translateY(-8px);
            box-shadow: 0 15px 40px rgba(102, 126, 234, 0.2);
            border-color: #667eea;
        }

        .stat-card:hover::before {
            top: 0;
            right: 0;
        }

        .stat-content {
            position: relative;
            z-index: 1;
        }

        .stat-icon {
            font-size: 42px;
            margin-bottom: 15px;
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
            font-size: 24px;
            font-weight: 800;
            color: #667eea;
        }

        .info-card {
            background: white;
            border-radius: 20px;
            padding: 30px;
            margin-bottom: 30px;
            box-shadow: 0 8px 30px rgba(0, 0, 0, 0.08);
            border: 1px solid #f0f0f5;
            animation: fadeIn 0.6s ease-out 0.6s both;
        }

        .info-item {
            display: flex;
            align-items: center;
            padding: 22px 0;
            border-bottom: 2px solid #f5f5f8;
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
            font-size: 19px;
            color: #2c3e50;
            font-weight: 700;
            word-break: break-all;
        }

        .password-container {
            display: flex;
            align-items: center;
            gap: 15px;
            flex-wrap: wrap;
        }

        .password-hidden {
            font-family: 'Courier New', monospace;
            letter-spacing: 4px;
            color: #667eea;
            font-size: 22px;
        }

        .toggle-password {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            border: none;
            padding: 8px 18px;
            border-radius: 10px;
            cursor: pointer;
            font-size: 12px;
            font-weight: 700;
            transition: all 0.4s cubic-bezier(0.34, 1.56, 0.64, 1);
            box-shadow: 0 4px 12px rgba(102, 126, 234, 0.3);
            position: relative;
            overflow: hidden;
        }

        .toggle-password::before {
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

        .toggle-password:hover::before {
            width: 200px;
            height: 200px;
        }

        .toggle-password:hover {
            transform: translateY(-3px);
            box-shadow: 0 8px 20px rgba(102, 126, 234, 0.4);
        }

        .toggle-password span {
            position: relative;
            z-index: 1;
        }

        .action-buttons {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 15px;
            margin-top: 35px;
            animation: fadeIn 0.6s ease-out 0.8s both;
        }

        .btn {
            padding: 16px 24px;
            border: none;
            border-radius: 14px;
            font-size: 15px;
            font-weight: 700;
            cursor: pointer;
            transition: all 0.4s cubic-bezier(0.34, 1.56, 0.64, 1);
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

        .btn span {
            position: relative;
            z-index: 1;
            font-size: 18px;
        }

        .btn-text {
            position: relative;
            z-index: 1;
        }

        .btn-back {
            background: linear-gradient(135deg, #95a5a6 0%, #7f8c8d 100%);
            color: white;
            box-shadow: 0 6px 20px rgba(127, 140, 141, 0.3);
        }

        .btn-back:hover {
            transform: translateY(-4px);
            box-shadow: 0 10px 30px rgba(127, 140, 141, 0.4);
        }

        .btn-logout {
            background: linear-gradient(135deg, #ef5350 0%, #c62828 100%);
            color: white;
            box-shadow: 0 6px 20px rgba(239, 83, 80, 0.3);
        }

        .btn-logout:hover {
            transform: translateY(-4px);
            box-shadow: 0 10px 30px rgba(239, 83, 80, 0.5);
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
            .profile-container {
                margin: 15px;
                border-radius: 24px;
            }

            .profile-header {
                padding: 40px 28px;
            }

            .avatar-container {
                width: 100px;
                height: 100px;
                font-size: 50px;
            }

            .profile-header h2 {
                font-size: 28px;
            }

            .profile-body {
                padding: 35px 28px;
            }

            .info-item {
                flex-direction: column;
                align-items: flex-start;
            }

            .info-icon {
                margin-bottom: 15px;
                margin-right: 0;
            }

            .password-container {
                flex-direction: column;
                align-items: flex-start;
                width: 100%;
            }

            .toggle-password {
                width: 100%;
            }
        }
    </style>
</head>

<body>
    <div class="profile-container">
        <div class="profile-header">
            <div class="avatar-container">👤</div>
            <h2><?= htmlspecialchars($user['username']) ?></h2>
            <p>Informasi Lengkap Akun Anda</p>
            <div class="role-badge">
                <?= $user['role'] === 'admin' ? '👑 Administrator' : '👤 User' ?>
            </div>
        </div>

        <div class="profile-body">
            <div class="security-notice">
                <span class="security-notice-icon">⚠️</span>
                <div>
                    <strong>Peringatan Keamanan</strong>
                    Password ditampilkan hanya untuk keperluan development. Dalam production environment, password tidak boleh ditampilkan dalam bentuk apapun.
                </div>
            </div>

            <div class="stats-grid">
                <div class="stat-card">
                    <div class="stat-content">
                        <div class="stat-icon">✅</div>
                        <div class="stat-label">Status Akun</div>
                        <div class="stat-value" style="color: #4caf50;">Active</div>
                    </div>
                </div>
                <div class="stat-card">
                    <div class="stat-content">
                        <div class="stat-icon">🔐</div>
                        <div class="stat-label">Keamanan</div>
                        <div class="stat-value" style="color: #2196f3;">Secure</div>
                    </div>
                </div>
            </div>

            <div class="info-card">
                <div class="info-item">
                    <div class="info-icon">👤</div>
                    <div class="info-content">
                        <div class="info-label">Username</div>
                        <div class="info-value"><?= htmlspecialchars($user['username']) ?></div>
                    </div>
                </div>

                <div class="info-item">
                    <div class="info-icon">👑</div>
                    <div class="info-content">
                        <div class="info-label">Role / Hak Akses</div>
                        <div class="info-value" style="text-transform: capitalize;">
                            <?= htmlspecialchars($user['role']) ?>
                        </div>
                    </div>
                </div>

                <div class="info-item">
                    <div class="info-icon">🔐</div>
                    <div class="info-content">
                        <div class="info-label">Password</div>
                        <div class="password-container">
                            <div class="info-value">
                                <span id="passwordDisplay" class="password-hidden">••••••••</span>
                                <span id="passwordReal" style="display: none;"><?= htmlspecialchars($user['password']) ?></span>
                            </div>
                            <button class="toggle-password" onclick="togglePassword()">
                                <span id="toggleText">👁️ Tampilkan</span>
                            </button>
                        </div>
                    </div>
                </div>
            </div>

            <div class="action-buttons">
                <a href="index.php?controller=item&action=index" class="btn btn-back">
                    <span>↩️</span>
                    <span class="btn-text">Kembali</span>
                </a>
                <a href="index.php?controller=auth&action=logout" class="btn btn-logout" onclick="return confirm('⚠️ Konfirmasi Logout\n\nYakin ingin keluar dari sistem?')">
                    <span>🚪</span>
                    <span class="btn-text">Logout</span>
                </a>
            </div>
        </div>
    </div>

    <script>
        let passwordVisible = false;

        function togglePassword() {
            const passwordDisplay = document.getElementById('passwordDisplay');
            const passwordReal = document.getElementById('passwordReal');
            const toggleText = document.getElementById('toggleText');

            passwordVisible = !passwordVisible;

            if (passwordVisible) {
                passwordDisplay.style.display = 'none';
                passwordReal.style.display = 'inline';
                toggleText.innerHTML = '🙈 Sembunyikan';
            } else {
                passwordDisplay.style.display = 'inline';
                passwordReal.style.display = 'none';
                toggleText.innerHTML = '👁️ Tampilkan';
            }
        }

        document.addEventListener('DOMContentLoaded', function() {
            const logoutBtn = document.querySelector('.btn-logout');
            logoutBtn.addEventListener('click', function(e) {
                if (!confirm('⚠️ Konfirmasi Logout\n\nYakin ingin keluar dari sistem?')) {
                    e.preventDefault();
                }
            });
        });
    </script>
</body>

</html>