<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Employee Management</title>
    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css" rel="stylesheet">
    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        * {
            font-family: 'Poppins', sans-serif;
        }

        body {
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            background: linear-gradient(135deg, #4f46e5, #2563eb, #06b6d4);
            overflow: hidden;
        }

        /* Bubble Background */
        body::before,
        body::after {
            content: "";
            position: absolute;
            border-radius: 50%;
            filter: blur(60px);
            opacity: .4;
        }

        body::before {
            width: 350px;
            height: 350px;
            background: #ffffff;
            top: -80px;
            left: -80px;
        }

        body::after {
            width: 280px;
            height: 280px;
            background: #38bdf8;
            bottom: -70px;
            right: -70px;
        }

        .login-card {
            width: 100%;
            max-width: 420px;
            border: none;
            border-radius: 20px;
            background: rgba(255, 255, 255, .9);
            backdrop-filter: blur(20px);
            box-shadow: 0 20px 60px rgba(0, 0, 0, .15);
            animation: fadeUp .7s ease;
            position: relative;
            z-index: 10;
        }

        @keyframes fadeUp {
            from {
                opacity: 0;
                transform: translateY(40px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .logo {
            width: 80px;
            height: 80px;
            margin: auto;
            background: linear-gradient(135deg, #2563eb, #4f46e5);
            color: white;
            border-radius: 20px;
            display: flex;
            justify-content: center;
            align-items: center;
            font-size: 35px;
            box-shadow: 0 10px 30px rgba(37, 99, 235, .4);
        }

        h3 {
            font-weight: 700;
            margin-top: 20px;
        }

        .subtitle {
            color: #6b7280;
            font-size: 14px;
        }

        .form-control {
            border-radius: 12px;
            padding: 12px 15px;
            border: 1px solid #d1d5db;
            transition: .3s;
        }

        .form-control:focus {
            box-shadow: 0 0 0 .2rem rgba(37, 99, 235, .2);
            border-color: #2563eb;
        }

        .input-group .btn {
            border-radius: 0 12px 12px 0;
        }

        .btn-login {
            background: linear-gradient(135deg, #2563eb, #4f46e5);
            border: none;
            border-radius: 12px;
            padding: 12px;
            color: white;
            font-weight: 600;
            transition: .3s;
        }

        .btn-login:hover {
            transform: translateY(-2px);
            box-shadow: 0 12px 30px rgba(37, 99, 235, .35);
        }

        .forgot {
            text-decoration: none;
            color: #2563eb;
            font-size: 14px;
        }

        .forgot:hover {
            text-decoration: underline;
        }

        .copyright {
            color: gray;
            font-size: 13px;
        }
    </style>
</head>

<body>
    <div class="card login-card">
        <div class="card-body p-5">
            <div class="text-center">
                <div class="logo">
                    <i class="bi bi-people-fill"></i>
                </div>
                <h3>Employee Management</h3>
                <p class="subtitle"> Welcome back! Please login to continue. </p>
            </div>
            @if (session('success'))
                <div class="alert alert-success mt-3">
                    {{ session('success') }}
                </div>
            @endif
            <form action="{{ route('login.process') }}" method="POST"> @csrf <div class="mb-3">
                    <label>Email</label>
                    <input type="email" name="email" value="{{ old('email') }}"
                        class="form-control @error('email') is-invalid @enderror" placeholder="example@email.com"
                        required> @error('email')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label>Password</label>
                    <div class="input-group">
                        <input type="password" id="password" name="password"
                            class="form-control @error('password') is-invalid @enderror" placeholder="••••••••"
                            required>
                        <button class="btn btn-outline-secondary" type="button" id="togglePassword">
                            <i class="bi bi-eye" id="toggleIcon"></i>
                        </button>
                    </div> @error('password')
                        <div class="text-danger mt-2">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <button class="btn btn-login w-100">
                    <i class="bi bi-box-arrow-in-right me-2"></i> Login </button>
            </form>
            <div class="text-center mt-4 copyright"> © {{ date('Y') }} Employee Management System </div>
        </div>
    </div>
    <script>
        const password = document.getElementById('password');
        const togglePassword = document.getElementById('togglePassword');
        const toggleIcon = document.getElementById('toggleIcon');
        togglePassword.addEventListener('click', () => {
            if (password.type === "password") {
                password.type = "text";
                toggleIcon.classList.replace('bi-eye', 'bi-eye-slash');
            } else {
                password.type = "password";
                toggleIcon.classList.replace('bi-eye-slash', 'bi-eye');
            }
        });
    </script>
</body>

</html>
