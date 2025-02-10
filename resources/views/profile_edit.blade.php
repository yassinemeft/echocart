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
    .profile-container {
        max-width: 900px;
        margin: 50px auto;
        background-color: white;
        border-radius: 10px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        padding: 20px;
    }
    .profile-header {
        display: flex;
        align-items: center;
        justify-content: center;
        text-align: center;
    }
    .profile-image {
        position: relative;
    }
    .profile-image img {
        width: 180px;
        height: 180px;
        border-radius: 50%;
        object-fit: cover;
        border: 3px solid #343a40;
    }
    .upload-btn {
        background-color: #343a40;
        color: white;
        border: none;
        font-size: 14px;
        cursor: pointer;
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
    .alert-success {
        background-color: #dff0d8;
        color: #3e8e41;
        border-color: #d6e9c6;
        padding: 15px;
        margin-bottom: 20px;
        border-radius: 5px;
    }
</style>
@endsection

@section('content')
<div class="edit-profile-container">
    <h2 class="text-center display-4">Edit Profile</h2>
    <div class="profile-header">
        <div class="profile-image card">
         <form action="{{ route('profile.update') }}" method="POST" enctype="multipart/form-data" class="d-flex align-items-center m-0 p-2">
                @csrf
                <img src="{{ auth()->user()->profile_image }}" alt="Profile Image" class="rounded-circle">
                <input type="file" name="profile_image" class="form-control mx-3" id="profile-upload">
                <button type="submit" class="btn upload-btn rounded w-50">Update Image</button>
         </form>
        </div>
    </div>
    
    <form action="{{ route('profile.edit') }}" method="POST">
        @csrf        
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



