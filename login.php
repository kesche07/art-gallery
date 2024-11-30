<?php

if (isset($_POST["submit1"])) {
    $u = $_POST['un'];
    $p = $_POST['pw'];

    $server = "localhost";
    $username = "root";
    $password = "";
    $database = "keshko";

    // Create connection
    $con = new mysqli($server, $username, $password, $database);

    // Check connection
    if ($con->connect_error) {
        die("Connection failed: " . $con->connect_error);
    }

    $errors = array();

    // Check for empty username
    if (empty($u)) {
        $errors['u'] = "Username required";
    }

    // Check for empty password
    if (empty($p)) {
        $errors['p'] = "Password required";
    }

    // If there are no errors, proceed with login
    if (count($errors) == 0) {
        // Prepare statement to check if username exists
        $stmt = $con->prepare("SELECT Password FROM signup1 WHERE Username = ?");
        $stmt->bind_param("s", $u);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            if (password_verify($p, $row['Password'])) {
                // Password is correct, redirect to main page
                header("Location: mainpage.php");
                exit();
            } else {
                // Password is incorrect
                $errors['p'] = "Incorrect password";
            }
        } else {
            // Username does not exist
            $errors['u'] = "Username does not exist. Please register.";
        }

        $stmt->close();
    }

    // Display errors
    foreach ($errors as $error) {
        echo "<script>alert('$error')</script>";
    }

    // Close connection
    $con->close();
}
?>
<html>
    <head>
        <title>
        Groovy Gallery
        </title>
        
        <link rel="stylesheet" type="text/css" href="p2.css">
    </head>
    <body>
            <div name="SignUp"><form method="post"><legend><center><h2>Login</h2></legend>
                <h3>Enter your Username</h3><input type="text" placeholder="Enter your username" name="un">
                <p class="danger"<?php if(isset($errors['u'])) echo $errors['u'];?></p><br>
                <h3>Enter your Password</h3><input type="text" placeholder="Enter your Password" name="pw">
                <p class="danger"<?php if(isset($errors['p'])) echo $errors['p'];?></p><br>
                <br><input type="Submit" name="submit1">
                <p>Don't have an account? <a href="signup.php">Register here</a></p> 
            </center></form></div>
            
    </div>
</body>
</html>