<?php
$success = 0;
$user = 0;



// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    include 'connect.php';

    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $confirmPassword = $_POST['confirmPassword'];

    // Validate if passwords match
    if ($password !== $confirmPassword) {
        die("Passwords do not match");
    }

    // Hash the password before storing it in the database (improve security)
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
    



    // Query to check if the username exists
    $sql = "SELECT COUNT(*) as count FROM users WHERE username = '$username'";
    $result = mysqli_query($conn, $sql);

    if ($result) {
        //$num = mysqli_num_rows($result);
        $row = mysqli_fetch_assoc($result);
        $userCount = $row['count'];

        if ($userCount > 0) {
            //Username already exists. Please choose a different username."
            $user = 1;
        } else {
            $sql = "INSERT INTO users (username, email, password) VALUES ('$username', '$email', '$hashedPassword')";
            $result = mysqli_query($conn,$sql);
            if($result){
                    //Registration successful"
                    $success = 1;
                }else{
                    die(mysqli_error($conn));
                }    
        }
    } 

}

    
    
?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register - To-Do List App</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

</head>
<body>

<?php
    if($user){
        echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>Error </strong> User already exist.
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>';
    }

    ?>

<?php
    if($success){
        echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Registration successful </strong>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>';
    }

    ?>

    <header>
        <h1 class ="text-center">Register for the To-Do List App</h1>
    </header>

    <main>
       

    <div class="container" mt-5>    
        <form  action="register.php" method="post">
            <div class="mb-3">
                <label for="username">Username:</label>
                <input type="text" id="username" name="username" required>
            </div>
            <div class="mb-3">
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" required>
            </div>
            <div class="mb-3">
                <label for="password">Password:</label>
                <input type="password" id="password" name="password" required>
            </div>
            <div class="mb-3">
                <label for="confirm_password">Confirm Password:</label>
                <input type="password" id="confirmPassword" name="confirmPassword" required>
            </div>
            <button type="submit" class="btn btn-primary">Register</button>
        </form>
    </div>

        <p>Already have an account? <a href="login.php">Log in here</a>.</p>
    </main>



</body>
</html>