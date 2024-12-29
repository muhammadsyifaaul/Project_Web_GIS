<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Location</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>
@extends('layouts.app')
@section('content')

<div class="container">
    <img src='/images/logosmg.png' alt="Logo2">
    <h1>Edit Location</h1>
    <form action="{{ route('locations.update', $location->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="name">Location Name</label>
            <input type="text" name="name" id="name" class="form-control" value="{{ $location->name }}" required>
        </div>

        <div class="form-group">
            <label for="latitude">Latitude</label>
            <input type="text" name="latitude" id="latitude" class="form-control" value="{{ $location->latitude }}" required>
        </div>

        <div class="form-group">
            <label for="longitude">Longitude</label>
            <input type="text" name="longitude" id="longitude" class="form-control" value="{{ $location->longitude }}" required>
        </div>

        <div class="form-group">
            <label for="photo">Photo</label>
            <input type="file" name="photo" id="photo" class="form-control">
            @if ($location->photo)
                <img src="{{ asset('storage/' . $location->photo) }}" alt="{{ $location->name }}" width="100">
            @endif
        </div>

        <button type="submit" class="btn btn-success">Update</button>
    </form>
</div>
@endsection

</body>
</html>
