<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Jual Beli Mobil</title>
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
            position: absolute;
            width: 600px;
            height: 600px;
            background: radial-gradient(circle, rgba(255, 255, 255, 0.15) 0%, transparent 70%);
            top: -300px;
            right: -200px;
            border-radius: 50%;
            animation: float 12s ease-in-out infinite;
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
            animation: float 15s ease-in-out infinite reverse;
        }

        @keyframes float {
            0%, 100% { 
                transform: translate(0, 0) rotate(0deg); 
                opacity: 0.5;
            }
            33% { 
                transform: translate(40px, -40px) rotate(8deg); 
                opacity: 0.8;
            }
            66% { 
                transform: translate(-30px, 30px) rotate(-8deg); 
                opacity: 0.6;
            }
        }

        .login-container {
            background: rgba(255, 255, 255, 0.98);
            backdrop-filter: blur(20px);
            border-radius: 28px;
            box-shadow: 0 30px 90px rgba(0, 0, 0, 0.4);
            overflow: hidden;
            width: 100%;
            max-width: 450px;
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

        .login-header {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            padding: 50px 35px 45px;
            text-align: center;
            color: white;
            position: relative;
            overflow: hidden;
        }

        .login-header::before {
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
            animation: slide 25s linear infinite;
        }

        @keyframes slide {
            0% { transform: translate(0, 0); }
            100% { transform: translate(50px, 50px); }
        }

        .icon {
            width: 90px;
            height: 90px;
            background: linear-gradient(135deg, rgba(255, 255, 255, 0.25) 0%, rgba(255, 255, 255, 0.15) 100%);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 25px;
            font-size: 45px;
            backdrop-filter: blur(10px);
            border: 3px solid rgba(255, 255, 255, 0.3);
            box-shadow: 0 15px 40px rgba(0, 0, 0, 0.2);
            animation: pulse 3s ease-in-out infinite;
            position: relative;
            z-index: 1;
        }

        @keyframes pulse {
            0%, 100% { 
                transform: scale(1);
                box-shadow: 0 15px 40px rgba(0, 0, 0, 0.2);
            }
            50% { 
                transform: scale(1.05);
                box-shadow: 0 20px 50px rgba(0, 0, 0, 0.3);
            }
        }

        .login-header h2 {
            font-size: 32px;
            margin-bottom: 12px;
            font-weight: 800;
            position: relative;
            z-index: 1;
            text-shadow: 0 3px 15px rgba(0, 0, 0, 0.3);
            letter-spacing: -0.5px;
        }

        .login-header p {
            font-size: 15px;
            opacity: 0.95;
            position: relative;
            z-index: 1;
            font-weight: 400;
        }

        .brand-info {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 12px;
            margin-bottom: 20px;
            position: relative;
            z-index: 1;
        }

        .brand-icon {
            font-size: 32px;
            animation: bounce 2s ease-in-out infinite;
        }

        @keyframes bounce {
            0%, 100% { transform: translateY(0); }
            50% { transform: translateY(-8px); }
        }

        .brand-text {
            font-size: 16px;
            font-weight: 600;
            opacity: 0.9;
        }

        .login-body {
            padding: 45px 35px;
            background: linear-gradient(to bottom, #ffffff 0%, #f8f9fc 100%);
        }

        .form-group {
            margin-bottom: 28px;
            animation: fadeIn 0.6s ease-out forwards;
            opacity: 0;
        }

        .form-group:nth-child(1) { animation-delay: 0.1s; }
        .form-group:nth-child(2) { animation-delay: 0.2s; }

        @keyframes fadeIn {
            to {
                opacity: 1;
                transform: translateY(0);
            }
            from {
                opacity: 0;
                transform: translateY(15px);
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

        .label-icon {
            font-size: 18px;
        }

        .input-wrapper {
            position: relative;
        }

        .form-group input {
            width: 100%;
            padding: 16px 20px 16px 52px;
            border: 2px solid #e1e8ed;
            border-radius: 14px;
            font-size: 15px;
            transition: all 0.3s ease;
            outline: none;
            background: white;
            font-weight: 500;
        }

        .form-group input:hover {
            border-color: #cbd5e0;
        }

        .form-group input:focus {
            border-color: #667eea;
            box-shadow: 0 0 0 4px rgba(102, 126, 234, 0.12);
            background: white;
            transform: translateY(-2px);
        }

        .input-icon {
            position: absolute;
            left: 18px;
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

        .btn-login {
            width: 100%;
            padding: 18px;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            border: none;
            border-radius: 14px;
            font-size: 17px;
            font-weight: 700;
            cursor: pointer;
            transition: all 0.4s cubic-bezier(0.34, 1.56, 0.64, 1);
            margin-top: 15px;
            box-shadow: 0 8px 25px rgba(102, 126, 234, 0.4);
            position: relative;
            overflow: hidden;
            animation: fadeIn 0.6s ease-out 0.3s both;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
        }

        .btn-login::before {
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

        .btn-login:hover::before {
            width: 400px;
            height: 400px;
        }

        .btn-login:hover {
            transform: translateY(-4px);
            box-shadow: 0 15px 40px rgba(102, 126, 234, 0.5);
        }

        .btn-login:active {
            transform: translateY(-2px);
        }

        .btn-text {
            position: relative;
            z-index: 1;
        }

        .btn-icon {
            position: relative;
            z-index: 1;
            font-size: 20px;
        }

        .alert {
            padding: 16px 20px;
            border-radius: 14px;
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

        .alert-error {
            background: linear-gradient(135deg, #f8d7da 0%, #f5c6cb 100%);
            color: #721c24;
            border-left: 5px solid #dc3545;
            box-shadow: 0 4px 15px rgba(220, 53, 69, 0.2);
        }

        .alert-error-icon {
            font-size: 24px;
        }

        .divider {
            display: flex;
            align-items: center;
            gap: 15px;
            margin: 30px 0 25px;
            color: #8492a6;
            font-size: 13px;
            font-weight: 600;
        }

        .divider::before,
        .divider::after {
            content: '';
            flex: 1;
            height: 1px;
            background: linear-gradient(90deg, transparent, #e0e6ed, transparent);
        }

        .info-box {
            background: linear-gradient(135deg, #f0f4ff 0%, #e8eeff 100%);
            padding: 18px;
            border-radius: 12px;
            margin-top: 25px;
            text-align: center;
            border: 2px solid #e0e8ff;
        }

        .info-box p {
            color: #4a5568;
            font-size: 13px;
            line-height: 1.6;
            font-weight: 500;
        }

        .info-icon {
            font-size: 20px;
            margin-bottom: 8px;
        }

        @media (max-width: 480px) {
            .login-container {
                margin: 15px;
                border-radius: 24px;
            }
            
            .login-header {
                padding: 40px 28px 35px;
            }

            .icon {
                width: 75px;
                height: 75px;
                font-size: 38px;
            }

            .login-header h2 {
                font-size: 28px;
            }

            .login-body {
                padding: 35px 28px;
            }

            .form-group input {
                padding: 15px 18px 15px 48px;
            }

            .btn-login {
                padding: 16px;
                font-size: 16px;
            }
        }

        /* Password toggle */
        .password-toggle {
            position: absolute;
            right: 18px;
            top: 50%;
            transform: translateY(-50%);
            cursor: pointer;
            font-size: 20px;
            color: #cbd5e0;
            transition: all 0.3s ease;
            z-index: 2;
        }

        .password-toggle:hover {
            color: #667eea;
        }
    </style>
</head>
<body>
    <div class="login-container">
        <div class="login-header">
            <div class="brand-info">
                <span class="brand-icon">🚗</span>
                <span class="brand-text">Jual Beli Mobil Bekas</span>
            </div>
            <div class="icon">🔐</div>
            <h2>Selamat Datang!</h2>
            <p>Silakan login untuk mengakses dashboard</p>
        </div>
        
        <div class="login-body">
            <?php if (isset($_SESSION['error'])): ?>
                <div class="alert alert-error">
                    <span class="alert-error-icon">⚠️</span>
                    <span><?php 
                        echo $_SESSION['error']; 
                        unset($_SESSION['error']);
                    ?></span>
                </div>
            <?php endif; ?>
            
            <form method="POST" action="index.php?controller=auth&action=login" id="loginForm">
                <div class="form-group">
                    <label for="username">
                        <span class="label-icon">👤</span>
                        Username
                    </label>
                    <div class="input-wrapper">
                        <input 
                            type="text" 
                            id="username" 
                            name="username" 
                            placeholder="Masukkan username Anda" 
                            required 
                            autofocus
                            autocomplete="username"
                        >
                        <span class="input-icon">👤</span>
                    </div>
                </div>
                
                <div class="form-group">
                    <label for="password">
                        <span class="label-icon">🔒</span>
                        Password
                    </label>
                    <div class="input-wrapper">
                        <input 
                            type="password" 
                            id="password" 
                            name="password" 
                            placeholder="Masukkan password Anda" 
                            required
                            autocomplete="current-password"
                        >
                        <span class="input-icon">🔒</span>
                        <span class="password-toggle" onclick="togglePassword()" id="toggleIcon">👁️</span>
                    </div>
                </div>
                
                <button type="submit" class="btn-login">
                    <span class="btn-icon">🚀</span>
                    <span class="btn-text">Masuk Sekarang</span>
                </button>
            </form>

            <div class="info-box">
                <div class="info-icon">💡</div>
                <p>Gunakan kredensial yang telah diberikan untuk mengakses sistem</p>
            </div>
        </div>
    </div>

    <script>
        function togglePassword() {
            const passwordInput = document.getElementById('password');
            const toggleIcon = document.getElementById('toggleIcon');
            
            if (passwordInput.type === 'password') {
                passwordInput.type = 'text';
                toggleIcon.textContent = '👁️‍🗨️';
            } else {
                passwordInput.type = 'password';
                toggleIcon.textContent = '👁️';
            }
        }

        document.getElementById('loginForm').addEventListener('submit', function(e) {
            const username = document.getElementById('username').value.trim();
            const password = document.getElementById('password').value;

            if (username === '') {
                e.preventDefault();
                alert('❌ Username tidak boleh kosong!');
                document.getElementById('username').focus();
                return false;
            }

            if (password === '') {
                e.preventDefault();
                alert('❌ Password tidak boleh kosong!');
                document.getElementById('password').focus();
                return false;
            }

            const submitBtn = this.querySelector('.btn-login');
            submitBtn.innerHTML = '<span class="btn-icon">⏳</span><span class="btn-text">Memproses...</span>';
            submitBtn.disabled = true;
        });

        document.querySelectorAll('input').forEach(input => {
            input.addEventListener('focus', function() {
                this.parentElement.style.transform = 'scale(1.01)';
            });
            
            input.addEventListener('blur', function() {
                this.parentElement.style.transform = 'scale(1)';
            });
        });

        document.addEventListener('DOMContentLoaded', function() {
            const inputs = document.querySelectorAll('input');
            inputs.forEach((input, index) => {
                input.style.animation = `fadeIn 0.6s ease-out ${0.1 + (index * 0.1)}s both`;
            });
        });
    </script>
</body>
</html>