<?php require('include/connection.php');?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
<div class="container">
    <nav class="navbar navbar-expand-lg navbar-light">
        <div class="container-fluid"> <a class="navbar-brand name" href="#">Favy.com</a> <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"> <span class="navbar-toggler-icon"></span> </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item"> <a class="nav-link active" aria-current="page" href="#">About</a> </li>
                    <li class="nav-item"> <a class="nav-link" href="#">Categories</a> </li>
                    <li class="nav-item"> <a class="nav-link" href="#">Blog</a> </li>
                    <li class="nav-item"> <a class="nav-link" href="#">Contact</a> </li>
                </ul>
                <form class="d-flex searchitem"> <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search"> <i class="fa fa-search"></i> </form>
            </div>
        </div>
    </nav>