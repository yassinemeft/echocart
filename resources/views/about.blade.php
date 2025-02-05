@extends('layouts.app')

@section('title', 'About Us')

@section('styles')
<style>
    /* About Us Page */
.container {
    max-width: 1200px;
    margin: 0 auto;
    padding: 20px;
}

.card {
    border-radius: 10px;
}

.card-img-top {
    border-radius: 50%;
}

.card-title {
    font-size: 1.5rem;
    font-weight: bold;
    color: #333;
}

.card-text {
    font-size: 1rem;
    color: #6c757d;
    margin-bottom: 20px;
}

.card-body {
    padding: 20px;
}

.btn {
    padding: 10px 20px;
    margin: 5px;
    font-size: 1rem;
}

.btn-primary {
    background-color: #007bff;
    color: white;
    border: none;
    border-radius: 5px;
    text-decoration: none;
}

.btn-primary:hover {
    background-color: #0056b3;
}

.btn-secondary {
    background-color: #6c757d;
    color: white;
    border: none;
    border-radius: 5px;
    text-decoration: none;
}

.btn-secondary:hover {
    background-color: #5a6268;
}

h2 {
    font-size: 2.5rem;
    font-weight: bold;
    color: #343a40;
    text-transform: uppercase;
    text-align: center;
    margin-bottom: 30px;
}

h3 {
    font-size: 2rem;
    font-weight: bold;
    color: #343a40;
    margin-bottom: 15px;
}
p {
    font-size: 1rem;
}
</style>

@section('content')
<div class="container mt-5">


    <!-- About Us Page -->
    <div class="card mb-5 p-5">
        <h2 class="text-center mb-4 display-4">About Us</h2>
        <div class="row">
            <!-- Developer 1 -->
            
            <div class="col-md-6 mb-4">
                <div class="card shadow-sm border-light">
                    <img src="https://via.placeholder.com/300" alt="Developer 1" class="card-img-top rounded-circle mx-auto mt-3" style="width: 150px; height: 150px; object-fit: cover;">
                    <div class="card-body text-center">
                        <h4 class="card-title">Yassine Meftah</h4>
                        <p class="card-text">I am a second-year Multimedia and Web Design student from Essaouira, Morocco. I have a passion for coding and creating intuitive web applications. 
                            I specialize in front-end development with HTML, CSS, and JavaScript, and I am currently expanding my backend skills with PHP, Laravel, and MongoDB.</p>
                        <p><strong>Skills:</strong> HTML, CSS, JavaScript, PHP, Laravel, MongoDB, Bootstrap, MySQL, Node.js, Express.js</p>
                        <a href="https://github.com/yassinemeft" target="_blank" class="btn btn-primary">GitHub</a>
                        <a href="mailto:ymeftah777@gmail.com" class="btn btn-secondary">Contact</a>
                    </div>
                </div>
            </div>
            
            <!-- Developer 2 -->
            <div class="col-md-6 mb-4">
                <div class="card shadow-sm border-light">
                    <img src="https://via.placeholder.com/300" alt="Developer 2" class="card-img-top rounded-circle mx-auto mt-3" style="width: 150px; height: 150px; object-fit: cover;">
                    <div class="card-body text-center">
                        <h4 class="card-title">Ayoub Zouitine</h4>
                        <p class="card-text">I am a second-year Multimedia and Web Design student from Essaouira, Morocco. I have a passion for coding and creating intuitive web applications. 
                        I specialize in front-end development with HTML, CSS, and JavaScript, and I am currently expanding my backend skills with PHP, Laravel.</p>
                        <p><strong>Skills:</strong> JavaScript, Laravel, PHP, Node.js, HTML, CSS, MySQL, Bootstrap</p>
                        <a href="https://github.com/AYOUB-41" target="_blank" class="btn btn-primary">GitHub</a>
                        <a href="mailto:zouitineayoub20@gmail.com" class="btn btn-secondary">Contact</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="card p-5">
        <div class="mt-5 text-center">
            <h3 class="display-4">Our Mission</h3>
            <p class="lead font-weight-bold">Empowering Digital Innovation Through Creativity and Technology</p>
            <p>We are a team of dedicated developers passionate about building modern, high-quality web applications. Our mission is to transform ideas into seamless digital experiences by 
                leveraging cutting-edge technologies and best industry practices. We believe in continuous learning, innovation, and collaboration to create intuitive, user-friendly, and scalable solutions that make a difference.</p>
                <p>At the core of our work is a commitment to excellence, problem-solving, and a deep understanding of user needs. We aim to bridge the gap between design and functionality, 
                    ensuring that every project we develop is visually appealing, responsive, and efficient. Whether it's e-commerce platforms, 
                    dynamic web applications, or backend development, we thrive on challenges and push the boundaries of what’s possible.</p>
                    <p>We are more than just developers; we are creators, thinkers, and problem-solvers. Join us on this journey as we continue to innovate, build, and redefine the digital landscape.</p>
                </div>
            </div>
</div>
@endsection
