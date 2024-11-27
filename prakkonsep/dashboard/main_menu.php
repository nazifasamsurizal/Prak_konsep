<?php
session_start();
if(!isset($_SESSION['username'])){
    header('Location: ../authentication/login.html');
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Main Menu</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #D2B48C;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }
        .menu-container {
            background-color: #ffffff;
            border: 2px solid black;
            border-radius: 10px;
            padding: 30px;
            text-align: center;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            width: 300px;
        }
        .menu-container h1 {
            font-size: 1.8em;
            color: black;
            margin-bottom: 20px;
        }
        .menu-container .btn {
            width: 100%;
            margin-bottom: 15px;
            color: black;
            border: black;
        }
        .menu-container .btn:first-of-type {
        background-color: #A0522D; 
        color: white;
        }
        .menu-container .btn:first-of-type:hover {
        background-color: #8B4513; 
        }
        .menu-container .btn:last-of-type {
        background-color: #CB6E4A; 
        color: white;
        }
        .menu-container .btn:last-of-type:hover {
        background-color: #D16C4A; 
        }
</style>
</head>
<body>
    <div class="menu-container">
        <h1>Main Menu</h1>
        <a href="../crud/index.php" class="btn btn-primary">Melihat Database</a>
        <a href="../dashboard/index.html" class="btn btn-danger">Logout</a>
    </div>
</body>
</html>