<?php
if (isset($_POST["submit1"])) {
    $u = $_POST['un'];
    $pw = $_POST['pw'];
    $e = $_POST['e'];

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
    } else {
        // Prepare statement to check if username exists
        $stmt_u = $con->prepare("SELECT * FROM signup1 WHERE Username = ?");
        $stmt_u->bind_param("s", $u);
        $stmt_u->execute();
        $result_u = $stmt_u->get_result();

        if ($result_u->num_rows > 0) {
            $errors['u'] = "Sorry... username already taken";
        }
        $stmt_u->close();
    }

    // Check for empty email
    if (empty($e)) {
        $errors['e'] = "Email required";
    } else {
        // Prepare statement to check if email exists
        $stmt_e = $con->prepare("SELECT * FROM signup1 WHERE Email = ?");
        $stmt_e->bind_param("s", $e);
        $stmt_e->execute();
        $result_e = $stmt_e->get_result();

        if ($result_e->num_rows > 0) {
            $errors['e'] = "Sorry... email already taken";
        }
        $stmt_e->close();
    }

    // Check for empty password
    if (empty($pw)) {
        $errors['pw'] = "Password required";

}

    // If there are no errors, proceed with registration
    if (count($errors) == 0) {
        // Hash the password before storing it
        $hashed_pw = password_hash($pw, PASSWORD_DEFAULT);

        // Prepare insert statement
        $stmt_insert = $con->prepare("INSERT INTO signup1 (Username, Email, Password) VALUES (?, ?, ?)");
        $stmt_insert->bind_param("sss", $u, $e, $hashed_pw);

        if ($stmt_insert->execute()) {
            // Redirect to a new page after successful registration
            header("Location:mainpage.php"); // Change this to your desired page
            exit(); // Always call exit after header redirection
        } else {
            echo "<script>alert('Error: " . $stmt_insert->error . "')</script>";
        }

        $stmt_insert->close();
    } else {
        // Display errors
        foreach ($errors as $error) {
            echo "<script>alert('$error')</script>";
        }
    }
}
?>
<html>
    <head>
        <title>
        Groovy Gallery
        </title>
        
        <link rel="stylesheet" type="text/css" href="p1.css">
    </head>
    <body>
            <div name="SignUp"><form method="post"><legend><center><h2>SignUp</h2></legend>
                <h3>Enter your Username</h3><input type="text" placeholder="Enter your username" name="un">
                <p class="danger"<?php if(isset($errors['u'])) echo $errors['u'];?></p><br>
                <h3>Enter your Email</h3><input type="text" placeholder="Enter your Email" name="e">
                <p class="danger"<?php if(isset($errors['e'])) echo $errors['e'];?></p><br>
                <h3>Enter your Password</h3><input type="text" placeholder="Enter your Password" name="pw">
                <p class="danger"<?php if(isset($errors['p'])) echo $errors['e'];?></p><br>
                <br><input type="Submit" name="submit1">
            </center></form></div>
    </body>
</html>