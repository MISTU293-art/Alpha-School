<?php
// Enable error reporting for debugging
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Credentials
$username_correct = "admin";
$password_correct = "14112006";

// Initialize variables
$username = $password = "";
$formError = false;
$errorMessage = "";

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = htmlspecialchars(trim($_POST['username']));
    $password = htmlspecialchars(trim($_POST['password'])); // Fixed typo from 'passowrd'

    if (empty($username) || empty($password)) {
        $errorMessage = "<strong>Error:</strong> Please fill out all fields.";
        $formError = true;
    } elseif ($username === $username_correct && $password === $password_correct) {
        // Redirect to admin panel
        header("Location: adminpanel.html");
        echo "Welcome Admin";
        exit();
    } else {
        $errorMessage = "<strong>Error:</strong> Invalid credentials.";
        $formError = true;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        body {
            background-color: rgb(52, 236, 243);
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            padding: 20px;
            font-family: Arial, sans-serif;
        }
        .login {
            background-color: white;
            padding: 40px;
            border-radius: 12px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.2);
            width: 100%;
            max-width: 400px;
            text-align: center;
        }
        h2 {
            margin-bottom: 20px;
            color: #333;
        }
        input[type="text"],
        input[type="password"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border-radius: 4px;
            border: 1px solid #ccc;
        }
        input[type="submit"] {
            background-color: #4CAF50;
            color: white;
            padding: 10px 15px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            width: 100%;
        }
        .error-message {
            color: red;
            margin-bottom: 15px;
        }
    </style>
</head>
<body>
    <div class="login">
        <h2>Admin Login Panel</h2>
        <?php if ($formError): ?>
            <div class="error-message"><?php echo $errorMessage; ?></div>
        <?php endif; ?>
        <form action="" method="post">
            <input type="text" name="username" placeholder="Enter Your Username" required>
            <input type="password" name="password" placeholder="Enter Your Password" required>
            <input type="submit" value="Login">
        </form>
    </div>
</body>
</html>
