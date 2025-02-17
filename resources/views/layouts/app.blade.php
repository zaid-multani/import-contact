<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contacts Management</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" rel="stylesheet">
    <style>
        /* Custom Styles for Layout */
        body {
            font-family: Arial, sans-serif;
        }

        .navbar {
            border-bottom: 2px solid #e3e3e3;
        }

        .navbar-brand {
            font-size: 1.8rem;
            font-weight: bold;
        }

        .container {
            max-width: 1200px;
        }

        .card {
            border-radius: 12px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
        }

        .card-header {
            background-color: #4e73df;
            color: white;
            font-size: 1.5rem;
            padding: 16px;
            border-radius: 12px 12px 0 0;
        }

        .table {
            border-radius: 8px;
        }

        .table th,
        .table td {
            vertical-align: middle;
        }

        .pagination .page-link {
            border-radius: 50%;
            padding: 6px 12px;
        }

        .pagination .page-item.active .page-link {
            background-color: #4e73df;
            color: white;
            border-color: #4e73df;
        }

        .btn-rounded {
            border-radius: 25px;
            padding: 8px 16px;
        }

        .btn-export {
            background-color: #28a745;
            color: white;
        }

        .btn-export:hover {
            background-color: #218838 !important;
            color: white !important;
        }

        .btn-import {
            border-top-left-radius: none !important;
            border-bottom-left-radius: none !important;
            background-color: #17a2b8;
            color: white;
        }

        .btn-import:hover {
            background-color: #138496 !important;
            color: white !important;

        }

        .input-groupnew {
            position: relative;
            display: flex;
            flex-wrap: wrap;
            align-items: stretch;
            width: 100%;
            gap: 10px;
        }

        .btn-outline {
            border-radius: 25px;
            padding: 8px 16px;
        }

        .table-responsive {
            margin-top: 20px;
        }

        .mb-3 {
            margin-bottom: 16px;
        }

        .input-group {
            align-items: center;
        }

        nav>.pagination {
            gap: 10px;
        }
        .card-header{
            display: flex;
            justify-content:center;
        }
    </style>
</head>

<body>
    {{-- <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="{{ route('contacts.index') }}">Contacts App</a>
        </div>
    </nav> --}}

    <div class="container mt-4">
        @yield('content')
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
