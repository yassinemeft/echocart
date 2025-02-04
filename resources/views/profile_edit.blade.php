@extends('layouts.app')

@section('title', 'Edit Profile')

@section('styles')
<style>
    .edit-profile-container {
        max-width: 900px;
        margin: 50px auto;
        background-color: white;
        border-radius: 10px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        padding: 20px;
    }
    .form-group {
        margin-bottom: 15px;
    }
    .form-control {
        width: 100%;
        padding: 10px;
        border-radius: 5px;
        border: 1px solid #ddd;
    }
    .btn-save {
        background-color: #28a745;
        color: white;
        padding: 10px;
        border-radius: 5px;
        border: none;
        cursor: pointer;
        width: 100%;
        font-weight: bold;
    }
    .btn-save:hover {
        background-color: #218838;
    }
    .btn-cancel {
        background-color: #dc3545;
        color: white;
        padding: 10px;
        border-radius: 5px;
        border: none;
        cursor: pointer;
        width: 100%;
        font-weight: bold;
        margin-top: 10px;
    }
    .btn-cancel:hover {
        background-color: #c82333;
    }
</style>
@endsection

@section('content')
<div class="edit-profile-container">
    <h2 class="text-center">Edit Profile</h2>
    <form action="{{ route('profile.update') }}" method="POST">
        @csrf
        @method('PUT')
        
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" name="name" id="name" class="form-control" value="{{ Auth::user()->name }}" required>
        </div>
        
        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" name="email" id="email" class="form-control" value="{{ Auth::user()->email }}" required>
        </div>
        
        <div class="form-group">
            <label for="phone">Phone</label>
            <input type="text" name="phone" id="phone" class="form-control" value="{{Auth::user()->phone }}">
        </div>
        
        <div class="form-group">
            <label for="address">Address</label>
            <input type="text" name="address" id="address" class="form-control" value="{{Auth::user()->address }}">
        </div>
        
        <button type="submit" class="btn-save">Save Changes</button>
        <a href="{{ route('profile.show') }}" class="btn-cancel text-center d-block">Cancel</a>
    </form>
</div>
@endsection
