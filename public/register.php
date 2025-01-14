<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User register page</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

    <style>
        <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        .form-container {
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            width: 300px;
        }

        h3 {
            text-align: center;
            margin-bottom: 20px;
            color: #333;
        }

        .form-control {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
            border-radius: 5px;
            border: 1px solid #ddd;
        }
       
        .btn {
            width: 100%;
            padding: 10px;
            border: none;
            border-radius: 5px;
            color: #fff;
            background-color: #007bff;
            cursor: pointer;
            margin-bottom: 10px;
        }

        .btn:hover {
            background-color: #0056b3;
        }

        .btn-reset {
            background-color: #6c757d;
        }

        .btn-reset:hover {
            background-color: #5a6268;
        }
    </style>
    </style>
</head>
<body>
    <section class="form-container">
    <form action='register.php' method="post">
        <h3>Register Now</h3>
    <input type="text" name="username" placeholder="User Name" class="form-control" required>
    <input type="email" name="email" placeholder="Email" class="form-control" required>
    <input type="password" name="password" placeholder="Password" class="form-control" required>
    <input type="password" name="confirm_password" placeholder="Confirm Password" class="form-control" required>

    <input type="submit" value="Register" class="btn">
   <p>Already have an account? <a href="login.php">login now </a></p>
    </form>
    </section>

    
<?php
   // session_start();
    include 'dbconnection.php';

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    
        $username = $_POST['username'];
        $password = $_POST['password'];
        $confirm_password = $_POST['confirm_password'];
        $email = $_POST['email'];
/*Edit following data table queries according to your database*/ 
        if ($password !== $confirm_password) {
            echo "<script>alert('Passwords do not match.'); window.location.href='signup.php';</script>";
            exit();
        }

        $checkUser = "SELECT * FROM users WHERE name = '$username'";
        $resultUser = $conn->query($checkUser); 
         if ($resultUser->num_rows > 0) {
            echo "<script>alert('Username already exists.'); window.location.href='signup.php';</script>";
            exit();
        }

        $checkEmail = "SELECT * FROM users WHERE email = '$email'";
        $resultEmail = $conn->query($checkEmail);
        if ($resultEmail->num_rows > 0) {
            echo "<script>alert('Email already exists.'); window.location.href='signup.php';</script>";
            exit();
        }

        $sql = "INSERT INTO users (name, email,password)
                VALUES ('$username', '$email','$password')";

        if ($conn->query($sql) === TRUE) {
            echo "<script>alert('Registration successful.'); window.location.href='login.php';</script>";
        } else {
            echo "<script>alert('Error: " . $sql . "<br>" . $conn->error . "'); window.location.href='signup.php';</script>";
            
        }
    }
?>
</body>
</html>