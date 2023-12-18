<?php
$login=0;
$invalid=0;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    include 'connect.php';

    // Get user input
    $enteredUsername = $_POST["username"];
    $enteredPassword = $_POST["password"];

    

    // Query the database to check if the username exists
    $sql = "SELECT * FROM registration WHERE username = '$enteredUsername' AND password ='$enteredPassword'";
    $result = mysqli_query($conn,$sql);

    if ($result->num_rows > 0) {
        $login=1;
        session_start(); // Start a PHP session
        $_SESSION['username'] = $enteredUsername;
        header("Location: dashboard.php"); 
    
    }else {
        $invalid=1;
       

    }

}





?>


<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>login page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  </head>
  <body>
  <?php
    if($login){
        echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>You are logged in successfully </strong> 
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>';
    }

    ?>

<?php
    if($invalid){
        echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>Error </strong> Invalid username or password..
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>';
    }

    ?>


    
  <h1 class="text-center">Account Login </h1>
    <div class="container ">
        <form action="login.php" method="post">
            <div class="mb-3">
                <label for="username" class="form-label">Username:</label>
                <input type="text" name="username" id="username" class="form-control" required >
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password:</label>
                <input type="password"name="password" id="password" class="form-control"  required>
            </div>
            
            <button type="submit" class="btn btn-primary ">Login</button>
         </form>

    </div>
  </body>
</html>


