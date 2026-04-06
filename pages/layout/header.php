<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Dashboard IPLand</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">

    <style>
        body {
            background-color: #f4f6f9;
        }

        .sidebar {
            height: 100vh;
            background: #1e293b;
        }

        .sidebar a {
            color: #cbd5e1;
            display: block;
            padding: 12px;
            text-decoration: none;
            transition: 0.3s;
        }

        .sidebar a:hover {
            background: #334155;
            color: white;
        }

        .card {
            border-radius: 12px;
            box-shadow: 0 4px 10px rgba(0,0,0,0.05);
        }

        #map {
            border-radius: 12px;
        }
    </style>
</head>
<body>

<nav class="navbar navbar-light bg-white shadow-sm">
    <div class="container-fluid">
        <span class="navbar-brand fw-bold">🏠 WebGIS IPLand</span>
        <span>Halo, <?= $_SESSION['username']; ?></span>
    </div>
</nav>

<div class="container-fluid">
<div class="row">