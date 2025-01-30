@extends('layouts.app')

@section('title', 'Profile page')

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
        text-align: center;
    }
    .profile-image {
        position: relative;
        display: inline-block;
    }
    .profile-image img {
        width: 150px;
        height: 150px;
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
        width: 30px;
        height: 30px;
        font-size: 16px;
        cursor: pointer;
    }
    .profile-info {
        margin-top: 20px;
    }
    .profile-info h1 {
        font-size: 2rem;
        color: #343a40;
    }
    .profile-info p {
        font-size: 1.2rem;
        color: #6c757d;
    }
    .profile-actions {
        margin-top: 20px;
        display: flex;
        justify-content: center;
        gap: 15px;
    }
    .profile-actions button {
        padding: 10px 20px;
        border: none;
        border-radius: 5px;
        font-size: 1rem;
        font-weight: bold;
        cursor: pointer;
        transition: background-color 0.3s ease;
    }
    .btn-edit {
        background-color: #007bff;
        color: #fff;
    }
    .btn-edit:hover {
        background-color: #0056b3;
    }
    .btn-logout {
        background-color: #dc3545;
        color: #fff;
    }
    .btn-logout:hover {
        background-color: #b02a37;
    }
    .btn-password {
        background-color: #28a745;
        color: #fff;
    }
    .btn-password:hover {
        background-color: #218838;
    }
    .btn-delete {
        background-color: #ffc107;
        color: #fff;
    }
    .btn-delete:hover {
        background-color: #e0a800;
    }
    .btn-notifications {
        background-color: #6c757d;
        color: #fff;
    }
    .btn-notifications:hover {
        background-color: #5a6268;
    }
    .order-history {
        margin-top: 30px;
        text-align: left;
    }
    .order-history h2 {
        font-size: 1.5rem;
        color: #343a40;
    }
    .order-item {
        background-color: #f1f3f5;
        padding: 15px;
        border-radius: 10px;
        margin-bottom: 15px;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    }
    .order-item p {
        margin: 0;
        font-size: 1rem;
        color: #6c757d;
    }
</style>
@endsection

@section('content')
<div class="profile-container">
    <div class="profile-image">
        <img src="{{ asset('/images/echo_logo.png') }}" alt="Profile Image">
        <form action="#" method="POST" enctype="multipart/form-data">
            @csrf
            <input type="file" name="profile_image" id="profile-upload" style="display: none;" onchange="this.form.submit()">
            <button type="button" class="upload-btn" onclick="document.getElementById('profile-upload').click();">+</button>
        </form>
    </div>

    <div class="profile-info">
        <h1>John Doe</h1>
        <p>Email: johndoe@example.com</p>
        <p>Joined: 01 Jan 2023</p>
        <p>Phone: (123) 456-7890</p>
        <p>Address: 123 Main St, Springfield, IL</p>
    </div>

    <div class="profile-actions">
        <button class="btn-edit">Edit Profile</button>
        <button class="btn-password">Change Password</button>
        <button class="btn-notifications">Notifications</button>
        <button class="btn-delete">Delete Account</button>
        <button class="btn-logout">Logout</button>
    </div>

    <div class="order-history">
        <h2>Order History</h2>
        <div class="order-item">
            <p><strong>Order #1</strong></p>
            <p>Date: 15 Jan 2023</p>
            <p>Total: $100.00</p>
        </div>
        <div class="order-item">
            <p><strong>Order #2</strong></p>
            <p>Date: 10 Feb 2023</p>
            <p>Total: $200.00</p>
        </div>
        <div class="order-item">
            <p><strong>Order #3</strong></p>
            <p>Date: 22 Mar 2023</p>
            <p>Total: $150.00</p>
        </div>
    </div>
</div>
@endsection
