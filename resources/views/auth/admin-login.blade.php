<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Admin</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<style>
        .wrapper {
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100vh;
        background: linear-gradient(135deg, #f3f4f6, #e2e8f0); /* Gradasi lembut untuk background */
        font-family: Arial, sans-serif;
        }

        .login-container {
        background: linear-gradient(135deg, #ffffff, #f9fafb);
        padding: 30px;
        border-radius: 15px;
        box-shadow: 0 8px 15px rgba(0, 0, 0, 0.2);
        width: 350px;
        text-align: center;
        transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .login-container:hover {
        transform: translateY(-10px);
        box-shadow: 0 12px 20px rgba(0, 0, 0, 0.3);
        }

        h1 {
        font-size: 2em;
        margin-bottom: 20px;
        color: #1a202c;
        font-weight: bold;
        }

        label {
        display: block;
        margin-bottom: 8px;
        font-weight: 600;
        color: #4a5568;
        text-align: left;
        }

        input {
        width: 100%;
        padding: 12px;
        margin-bottom: 20px;
        border: 1px solid #cbd5e0;
        border-radius: 8px;
        font-size: 14px;
        box-sizing: border-box;
        background: #f9fafb;
        transition: border-color 0.3s ease;
        }

        input:focus {
        outline: none;
        border-color: #4299e1;
        box-shadow: 0 0 5px rgba(66, 153, 225, 0.5);
        }

        button {
        width: 100%;
        padding: 12px;
        background: linear-gradient(135deg, #4299e1, #2b6cb0);
        color: #ffffff;
        border: none;
        border-radius: 8px;
        font-size: 16px;
        font-weight: bold;
        cursor: pointer;
        transition: background 0.3s ease, transform 0.2s ease;
        }

        button:hover {
        background: linear-gradient(135deg, #2b6cb0, #2c5282);
        transform: scale(1.02);
        }

        button:active {
        background: #2a4365;
        }

        .error-message {
        display: flex;
        align-items: center;
        justify-content: center;
        background-color: #ffe4e6;
        color: #d60017;
        border: 1px solid #d60017;
        padding: 12px;
        border-radius: 8px;
        margin-bottom: 20px;
        font-size: 14px;
        font-weight: 600;
        text-align: center;
        box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }
        </style>
<body>
    <div class="wrapper">
        <div class="login-container">
            <h1>Login Admin</h1>
            
            <!-- Menampilkan pesan error jika ada -->
            @if ($errors->has('login'))
                <div class="error-message">
                    {{ $errors->first('login') }}
                </div>
            @endif

            <form action="{{ route('admin.login.submit') }}" method="POST">
                @csrf
                <label for="email">Email:</label>
                <input type="email" name="email" id="email" value="{{ old('email') }}" required>
                
                <label for="password">Password:</label>
                <input type="password" name="password" id="password" required>
                
                <button type="submit">Login</button>
            </form>
        </div>
    </div>
</body>
</html>
