<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add New Location</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <style>
        body {
            background-color: #f8f9fa;
        }
        .sidebar {
            background-color: #343a40;
            color: white;
            width: 250px;
            min-height: 100vh;
            padding: 20px;
            position: fixed;
        }
        .sidebar h4 {
            color: white;
            font-size: 1.5rem;
            margin-bottom: 30px;
            text-align: center;
        }
        .sidebar a {
            color: white;
            text-decoration: none;
            padding: 10px 15px;
            display: block;
            border-radius: 5px;
            margin-bottom: 10px;
            font-size: 1rem;
            text-align: center;
        }
        .sidebar a:hover {
            background-color: #495057;
            /*color:rgb(119, 255, 7);*/

        }
        .sidebar .logout {
            background-color: #dc3545;
            color: white;
        }
        .sidebar .logout:hover {
            background-color: #b02a37;
        }
        .content {
            margin-left: 620px;
            padding: 20px;
        }
        .card {
            border: none;
            border-radius: 15px;
            padding: 30px;
            max-width: 800px; 
            margin: 0 auto; 
        }
        .btn-success {
            border-radius: 10px;
        }
    </style>
</head>
<body>
@extends('layouts.app')
@section('content')

<div class="d-flex">
    <!-- Sidebar -->
    <div class="sidebar">
        <h4>{{ Auth::user()->name }}</h4> <!-- Nama admin secara otomatis dari database -->
        <a href="{{ route('dashboard') }}">Dashboard</a>
        <a href="{{ route('logout') }}" class="logout">Logout</a>
    </div>

    <!-- Main Content -->
    <div class="content">
        <div class="text-center mb-4">
            <img src="/images/logosmg.png" alt="Logo" class="img-fluid" style="max-width: 150px;">
            <h1 class="mt-3">Add New Location</h1>
        </div>
        
        <div class="card shadow-lg">
            <div class="card-body">
                <form action="{{ route('locations.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label for="name" class="form-label">Location Name</label>
                        <input type="text" name="name" id="name" class="form-control" placeholder="Enter location name" required>
                    </div>

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="latitude" class="form-label">Latitude</label>
                            <input type="text" name="latitude" id="latitude" class="form-control" placeholder="Enter latitude" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="longitude" class="form-label">Longitude</label>
                            <input type="text" name="longitude" id="longitude" class="form-control" placeholder="Enter longitude" required>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="photo" class="form-label">Photo</label>
                        <input type="file" name="photo" id="photo" class="form-control">
                    </div>

                    <div class="text-center">
                        <button type="submit" class="btn btn-success px-5">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
@endsection
</body>
</html>
