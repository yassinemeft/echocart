@extends('layouts.app')

@section('title', 'Profile Page')

@section('styles')
<style>
    body {
        font-family: Arial, sans-serif;
        margin: 0;
        padding: 0;
        background-color: #f8f9fa;
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
        gap: 20px;
        text-align: center;
    }
    .profile-image {
        position: relative;
    }
    .profile-image img {
        width: 100px;
        height: 100px;
        border-radius: 50%;
        object-fit: cover;
        border: 3px solid #343a40;
    }
    .upload-btn {
        position: absolute;
        bottom: 5px;
        right: 5px;
        background-color: #343a40;
        color: white;
        border: none;
        border-radius: 50%;
        width: 25px;
        height: 25px;
        font-size: 14px;
        cursor: pointer;
    }
    .info-row {
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding: 10px 15px;
        border-bottom: 1px solid #ddd;
    }
    .info-row:last-child {
        border-bottom: none;
    }
    .info-label {
        font-weight: bold;
        color: #343a40;
    }
    .info-value {
        color: #6c757d;
    }
    .btn-action {
        background-color: #343a40;
        color: white;
        border: none;
        padding: 5px 10px;
        border-radius: 5px;
        cursor: pointer;
        font-size: 14px;
        transition: background-color 0.3s ease;
    }
    .btn-action:hover {
        background-color: #495057;

    }
    .btn-logout {
        background-color:rgb(168, 16, 32);
        color: white;
        border: none;               
        padding: 10px;
        border-radius: 2px;
        cursor: pointer;
        font-size: 14px;
        transition: background-color 0.3s ease;
        width: 100%;
        font-weight: bold;
    }
    .btn-logout:hover {
        background-color:rgb(235, 62, 79);
    }
    .request-history {
        margin-top: 30px;
    }
    .request-history h2 {
        font-size: 1.5rem;
        color: #343a40;
    }
    .request-item {
        background-color: #f1f3f5;
        padding: 15px;
        border-radius: 10px;
        margin-bottom: 10px;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    }
    .request-item p {
        margin: 0;
        font-size: 1rem;
        color: #6c757d;
    }
    .btn-delete {
    background-color:rgb(168, 16, 32);
    color: white;
    border: none;
    padding: 10px;
    border-radius: 2px;
    cursor: pointer;
    font-size: 14px;
    transition: background-color 0.3s ease;
    width: 100%;
    font-weight: bold;
}

.btn-delete:hover {
    background-color:rgb(235, 62, 79);
}
.info-value {
    align-content: center;
    color: #6c757d;
}
</style>
@endsection

@section('content')
<div class="profile-container">
    
    <div class="profile-header">
        <div class="profile-image">
        <img src="{{ auth()->user()->profile_image }}" alt="Profile Image" class="rounded-circle" width="150">
            <form action="{{ route('profile.update') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <label for="profile_image">Profile Image</label>
                <input type="file" name="profile_image" class="form-control" id="profile-upload">
                <button type="submit" class="btn upload-btn">+</button>
            </form>
        </div>
    </div>

    <div class="profile-info">
        <div class="info-row">
            <span class="info-label">Name:</span>
            <span class="info-value">{{ Auth::user()->name }}</span>
        </div>
        <div class="info-row">
            <span class="info-label">Email:</span>
            <span class="info-value">{{ Auth::user()->email }}</span>
        </div>
        <div class="info-row">
            <span class="info-label">Password:</span>
            <span class="info-value">********</span>
        </div>
        <div class="info-row">
            <span class="info-label">Phone:</span>
            <span class="info-value">{{ $user->phone }}</span>
        </div>
        <div class="info-row">
            <span class="info-label">Address:</span>
            <span class="info-value">{{ $user->address }}</span>
        </div>
        <div class="info-row" style="justify-content: center;">
        <button class="btn-action" href="#">Edit Profile</button>
        </div>
    </div>

    <div class="request-history">
        <h2>Request History</h2>
        <div class="request-item">
            <p><strong>Request #1</strong></p>
            <p>Date: 12 Jan 2024</p>
            <p>Status: Completed</p>
        </div>
        <div class="request-item">
            <p><strong>Request #2</strong></p>
            <p>Date: 25 Feb 2024</p>
            <p>Status: Pending</p>
        </div>
        <div class="request-item">
            <p><strong>Request #3</strong></p>
            <p>Date: 10 Mar 2024</p>
            <p>Status: In Progress</p>
        </div><br>
        <div>
          <form action="{{ route('logout') }}" method="POST">
             @csrf
             <button type="submit" class="btn-action btn-logout">Logout</button>
          </form><br>
        
          <form id="delete-account-form" action="{{ route('account.delete') }}" method="POST">
             @csrf
             @method('DELETE')
            <button type="submit" class="btn-action btn-delete" onclick="return confirm('Are you sure you want to delete your account?');">Delete Account</button>
          </form>
        </div>
    </div>
</div>

@endsection
