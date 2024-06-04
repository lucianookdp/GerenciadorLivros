<!-- resources/views/livros/admin.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f0f2f5;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        body.dark-mode {
            background-color: #181818;
            color: #ffffff;
        }
        .card {
            background-color: #ffffff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 400px;
        }
        .card.dark-mode {
            background-color: #333333;
            color: #ffffff;
        }
        .btn-back {
            position: absolute;
            top: 20px;
            left: 20px;
            color: #007bff;
            font-size: 1.5rem;
        }
        .btn-back.dark-mode {
            color: #80bdff;
        }
        .card-header {
            font-size: 1.5rem;
            font-weight: bold;
            text-align: center;
        }
    </style>
</head>
<body>
    <a href="{{ route('home') }}" class="btn-back">
        <i class="fas fa-arrow-left"></i>
    </a>
    <div class="card">
        <div class="card-header">Admin Login</div>
        <div class="card-body">
            @if(session('error'))
                <div class="alert alert-danger">{{ session('error') }}</div>
            @endif
            <form action="{{ route('admin.login') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="username" class="form-label">Username</label>
                    <input type="text" name="username" id="username" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" name="password" id="password" class="form-control" required>
                </div>
                <button type="submit" class="btn btn-primary w-100">Login</button>
            </form>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            if (localStorage.getItem('mode') === 'dark') {
                document.body.classList.add('dark-mode');
                document.querySelector('.card').classList.add('dark-mode');
                document.querySelector('.btn-back').classList.add('dark-mode');
            }
        });
    </script>
</body>
</html>
