<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>
@extends('layouts.app')
@section(section: 'content')
<style>
    
</style>
<div class="container">
    <img src='/images/logosmg.png' alt="Logo2">
    <h1>Add New Location</h1>
    <form action="{{ route('locations.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="name">Location Name</label>
            <input type="text" name="name" id="name" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="latitude">Latitude</label>
            <input type="text" name="latitude" id="latitude" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="longitude">Longitude</label>
            <input type="text" name="longitude" id="longitude" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="photo">Photo</label>
            <input type="file" name="photo" id="photo" class="form-control">
        </div>

        <button type="submit" class="btn btn-success">Save</button>
    </form>
</div>
@endsection

</body>
</html>