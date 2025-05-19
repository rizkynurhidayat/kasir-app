<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aplikasi Kasir</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css">
    <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"> -->
    <link rel="icon" type="image/png" href="{{ asset('logo.png') }}">
    
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }

        header {
            background-color: #3498db;
            color: white;
            padding: 20px;
            text-align: center;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }

        nav {
            background-color: #2980b9;
            padding: 10px;
            text-align: center;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }

        nav a {
            color: white;
            text-decoration: none;
            margin: 0 15px;
            font-weight: bold;
            transition: color 0.3s;
        }

        nav a:hover {
            color: #f1c40f;
        }

        main {
            padding: 20px;
            max-width: 1200px;
            margin: auto;
        }

        footer {
            text-align: center;
            color: #888;
            padding: 10px;
            margin-top: 30px;
            font-size: 0.9em;
        }
    </style>
</head>
<body>
    <header>
        <h1>Aplikasi Kasir</h1>
    </header>

    <nav>
        <a href="{{ route('products.index') }}">Produk</a>
        <a href="{{ route('customers.index') }}">Pelanggan</a>
        <a href="{{ route('cart.index') }}">Keranjang</a>
        <a href="{{ route('transactions.history') }}">Riwayat Transaksi</a>
        <a href="/">Beranda</a>
    </nav>

    <main>
        @yield('content')
    </main>

    <footer>
        &copy; {{ date('Y') }} Aplikasi Kasir
    </footer>
</body>
</html>
