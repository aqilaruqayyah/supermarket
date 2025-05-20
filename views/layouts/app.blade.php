<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>@yield('title', 'Supermarket App')</title>

    <!-- Bisa tambahkan CSS di sini -->
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
            background-color: #f9f9f9;
        }
        .container {
            max-width: 900px;
            margin: auto;
            background: white;
            padding: 20px;
            box-shadow: 0 0 8px rgba(0,0,0,0.1);
            border-radius: 5px;
        }
        header {
            margin-bottom: 20px;
        }
        nav a {
            margin-right: 15px;
            text-decoration: none;
            color: #333;
        }
        nav a:hover {
            color: #007BFF;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }
        table, th, td {
            border: 1px solid #ddd;
        }
        th, td {
            padding: 8px;
            text-align: left;
        }
        .success-message {
            color: green;
            margin-bottom: 15px;
        }
    </style>
</head>
<body>
    <div class="container">
        <header>
            <h1>@yield('title')</h1>
            <nav>
                <a href="{{ route('kategori.index') }}">Kategori</a>
                <a href="{{ route('produk.index') }}">Produk</a>
                <a href="{{ route('penjual.index') }}">Penjual</a>
                <a href="{{ route('pembeli.index') }}">Pembeli</a>
                <a href="{{ route('pembelian.index') }}">Pembelian</a>
            </nav>
        </header>

        @if(session('success'))
            <div class="success-message">
                {{ session('success') }}
            </div>
        @endif

        @yield('content')
    </div>
</body>
</html>
