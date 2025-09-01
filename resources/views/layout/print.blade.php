<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>@yield('title', 'Laporan')</title>
    <link rel="stylesheet" href="{{ asset('/assets/css/bootstrap.min.css') }}">
    <style>
        body { padding: 20px; }
        @media print {
            .no-print { display: none; }
        }
    </style>
</head>
<body>
    @yield('content')
</body>
</html>
