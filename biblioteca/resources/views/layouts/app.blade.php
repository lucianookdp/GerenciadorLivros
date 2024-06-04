<!-- resources/views/layouts/app.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Biblioteca</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f0f2f5;
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }
        body.dark-mode {
            background-color: #181818;
            color: #ffffff;
        }
        .container {
            margin-top: 30px;
            background-color: #ffffff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            flex: 1;
        }
        .container.dark-mode {
            background-color: #242424;
            color: #ffffff;
        }
        .card {
            margin-bottom: 20px;
        }
        .card.dark-mode {
            background-color: #333333;
            color: #ffffff;
        }
        .list-group-item {
            background-color: #ffffff;
        }
        .list-group-item.dark-mode {
            background-color: #333333;
            color: #ffffff;
        }
        .notification {
            position: fixed;
            top: 20px;
            right: 20px;
            z-index: 1000;
        }
        .notification .alert {
            margin-bottom: 0;
        }
        .carousel-inner img {
            height: 500px; /* Define a altura fixa para as imagens */
            object-fit: cover; /* Ajusta a imagem para preencher o contêiner */
        }
        .carousel-item {
            background-color: #000;
        }
        .carousel-indicators [data-bs-target] {
            background-color: #007bff;
        }
        .btn-primary {
            background-color: #007bff;
            border-color: #007bff;
        }
        .btn-primary:hover {
            background-color: #0056b3;
            border-color: #0056b3;
        }
        .btn-primary.dark-mode {
            background-color: #0056b3;
            border-color: #0056b3;
        }
        .btn-blue {
            background-color: #007bff;
            border-color: #007bff;
            color: #fff;
        }
        .btn-blue:hover {
            background-color: #0056b3;
            border-color: #0056b3;
            color: #fff;
        }
        .btn-blue.dark-mode {
            background-color: #0056b3;
            border-color: #0056b3;
        }
        .content-section {
            padding: 40px 0;
            border-bottom: 1px solid #ddd;
        }
        .content-section h2 {
            margin-bottom: 20px;
            color: #007bff;
        }
        .content-section.dark-mode h2 {
            color: #80bdff;
        }
        .content-section p, .content-section ul {
            font-size: 1.2rem;
            line-height: 1.6;
        }
        .content-section ul li {
            margin-bottom: 10px;
        }
        .content-section ul li i {
            margin-right: 10px;
        }
        header {
            background-color: #007bff;
            color: white;
            padding: 20px; /* Increased padding for a larger header */
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        header.dark-mode {
            background-color: #333333;
        }
        .logo {
            display: flex;
            align-items: center;
            gap: 10px;
            text-decoration: none;
            color: white;
        }
        .logo i {
            font-size: 2rem;
        }
        .header-title {
            font-size: 1.5rem; /* Increased font size for a larger header title */
            margin: 0;
        }
        .logo:hover, .logo:focus, .header-title:hover, .header-title:focus {
            text-decoration: none;
            color: white;
        }
        .header-links {
            display: flex;
            gap: 15px;
            align-items: center;
        }
        .header-links a {
            color: white;
            text-decoration: none;
            font-weight: bold;
            padding: 10px 20px; /* Standard padding for all buttons */
            border: 2px solid white;
            border-radius: 5px;
            transition: background-color 0.3s, color 0.3s;
        }
        .header-links a:hover {
            background-color: white;
            color: #007bff;
        }
        .header-links a.dark-mode {
            color: #ccc;
            border-color: #ccc;
        }
        .header-links a.dark-mode:hover {
            background-color: #ccc;
            color: #333333;
        }
        .header-links .admin-link {
            font-size: 1rem; /* Same font size for all links */
            padding: 10px 20px; /* Same padding for all links */
        }
        footer {
            background-color: #f8f9fa;
            padding: 20px 0;
            text-align: center;
            margin-top: 20px;
        }
        footer.dark-mode {
            background-color: #333333;
            color: #ccc;
        }
        footer a {
            color: #007bff;
            text-decoration: none;
        }
        footer a:hover {
            text-decoration: underline;
        }
        .github-icon {
            color: #007bff;
            font-size: 1.5rem;
            margin-left: 5px;
        }
        .mode-toggle {
            cursor: pointer;
            color: white;
            font-size: 1.5rem;
            padding: 8px;
        }
        .mode-toggle.dark-mode {
            color: #ccc;
        }
    </style>
</head>
<body>
    <header>
        <a href="{{ route('home') }}" class="logo">
            <i class="fas fa-book"></i>
            <h1 class="header-title">Ressabiados BookManager</h1>
        </a>
        <div class="header-links">
            <a href="{{ route('home') }}">Início</a>
            <a href="{{ route('livros.lista') }}">Lista</a>
            <a href="{{ route('admin.loginForm') }}" class="admin-link">Admin</a>
            <i class="fas fa-moon mode-toggle" onclick="toggleMode()"></i>
        </div>
    </header>
    <div class="container">
        @yield('content')
    </div>
    <footer>
        <p>&copy; 2024 Ressabiados BookManager. Todos os direitos reservados.</p>
        <p>
            <a href="https://github.com/lucianookdp" target="_blank">
                GitHub
                <i class="fab fa-github github-icon"></i>
            </a>
        </p>
    </footer>
    <div class="notification">
        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        @if(session('error'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                {{ session('error') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        function toggleMode() {
            const body = document.body;
            const header = document.querySelector('header');
            const container = document.querySelector('.container');
            const footer = document.querySelector('footer');
            const contentSections = document.querySelectorAll('.content-section');
            const links = document.querySelectorAll('.header-links a');
            const modeToggle = document.querySelector('.mode-toggle');
            const cards = document.querySelectorAll('.card');
            const listGroupItems = document.querySelectorAll('.list-group-item');
            const buttons = document.querySelectorAll('.btn-primary, .btn-blue');

            body.classList.toggle('dark-mode');
            header.classList.toggle('dark-mode');
            container.classList.toggle('dark-mode');
            footer.classList.toggle('dark-mode');
            modeToggle.classList.toggle('dark-mode');

            contentSections.forEach(section => section.classList.toggle('dark-mode'));
            links.forEach(link => link.classList.toggle('dark-mode'));
            cards.forEach(card => card.classList.toggle('dark-mode'));
            listGroupItems.forEach(item => item.classList.toggle('dark-mode'));
            buttons.forEach(button => button.classList.toggle('dark-mode'));

            // Change the icon based on the mode
            if (body.classList.contains('dark-mode')) {
                modeToggle.classList.remove('fa-moon');
                modeToggle.classList.add('fa-sun');
            } else {
                modeToggle.classList.remove('fa-sun');
                modeToggle.classList.add('fa-moon');
            }

            // Save mode preference
            if (body.classList.contains('dark-mode')) {
                localStorage.setItem('mode', 'dark');
            } else {
                localStorage.setItem('mode', 'light');
            }
        }

        // Load mode preference
        document.addEventListener('DOMContentLoaded', function() {
            if (localStorage.getItem('mode') === 'dark') {
                toggleMode();
            }
        });
    </script>
</body>
</html>
