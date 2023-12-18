<?php
session_start(); // Start a PHP session
if(!isset($_SESSION['username'])){
    header('location:login.php');
}


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home - To-Do List App</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>
<body>

<header>
    <h1 class="text-center">Welcome 
        <?php echo $_SESSION['username']; ?>
    </h1>
</header>

<main>
    <div class="container mt-5">
        <p>This is your dashboard. You can start managing your to-do list here!</p>
        <!-- Include your to-do list or other content here -->
    </div>

    <p><a href="logout.php">Logout</a></p>
    <!-- Add a logout link to allow users to log out -->
</main>

</body>
</html>