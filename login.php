<?php
# Initialize session
session_start();

# Check if user is already logged in, If yes then redirect him to index page
if (isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] == TRUE) {
    echo "<script>" . "window.location.href='./'" . "</script>";
    exit;
}

# Include connection
require_once "config.php";

# Define variables and initialize with empty values
$username = $password = "";
$username_err = $password_err = $login_err = "";

# Processing form data when form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    # Check if username is empty
    if (empty(trim($_POST["user_login"]))) {
        $username_err = "Please enter username.";
    } else {
        $username = trim($_POST["user_login"]);
    }

    # Check if password is empty
    if (empty(trim($_POST["user_password"]))) {
        $password_err = "Please enter your password.";
    } else {
        $password = trim($_POST["user_password"]);
    }

    # Validate credentials
    if (empty($username_err) && empty($password_err)) {
        # Prepare a select statement
        $sql = "SELECT id, username, password, type FROM users WHERE username = ? AND password = ?";

        if ($stmt = $db->prepare($sql)) {
            # Bind variables to the prepared statement as parameters
            $stmt->bind_param("ss", $param_username, $param_password);

            # Set parameters
            $param_username = $username;
            $param_password = $password;

            # Attempt to execute the prepared statement
            if ($stmt->execute()) {
                # Store result
                $stmt->store_result();

                # Check if username and password exist
                if ($stmt->num_rows == 1) {
                    # Bind result variables
                    $stmt->bind_result($id, $username, $password, $type);
                    if ($stmt->fetch()) {
                        # Start a new session
                        // session_start();

                        # Store data in session variables
                        $_SESSION["loggedin"] = true;
                        $_SESSION["id"] = $id;
                        $_SESSION["username"] = $username;
                        $_SESSION["type"] = $type;

                        # Redirect user to welcome page
                        echo "<script>" . "window.location.href='./'" . "</script>";
                    }
                } else {
                    # Username or password is not valid
                    $login_err = "Invalid username or password.";
                }
            } else {
                echo "Oops! Something went wrong. Please try again later.";
            }

            # Close statement
            $stmt->close();
        }
    }

    # Close connection
    $db->close();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login SIPER</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <link rel="stylesheet" href="./css/main.css">
    <link rel="shortcut icon" href="./img/favicon-16x16.png" type="image/x-icon">
    <script defer src="./js/script.js"></script>
</head>
<style>
    body {
        font-family: Arial, Helvetica, sans-serif;
    }

    .container {
        width: 60%;
    }
</style>

<body>
    <div class="container">
        <div class="row min-vh-100 justify-content-center align-items-center">
            <div class="col-lg-5">
                <?php
                if (!empty($login_err)) {
                    echo "<div class='alert alert-danger'>" . $login_err . "</div>";
                }
                ?>
                <div class="form-wrap border rounded p-4">
                    <center>
                        <h1>Login</h1>
                        <p>Silahkan Login Untuk Melanjutkan</p>
                    </center>
                    <!-- form starts here -->
                    <form action="<?= htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" novalidate>
                        <div class="mb-3">
                            <label for="user_login" class="form-label">Username</label>
                            <input type="text" class="form-control" name="user_login" id="user_login" value="<?= htmlspecialchars($username); ?>">
                            <small class="text-danger"><?= $username_err; ?></small>
                        </div>
                        <div class="mb-2">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" class="form-control" name="user_password" id="password">
                            <small class="text-danger"><?= $password_err; ?></small>
                        </div>
                        <div class="mb-3 form-check">
                            <input type="checkbox" class="form-check-input" id="togglePassword">
                            <label for="togglePassword" class="form-check-label">Tampilkan Password</label>
                        </div>
                        <div class="mb-3">
                            <input type="submit" class="btn btn-primary form-control" name="submit" value="Log In">
                        </div>
                        <!-- <p class="mb-0">Belum punya akun ? <a href="./register.php">Sign Up</a></p> -->
                    </form>
                    <!-- form ends here -->
                </div>
            </div>
        </div>
    </div>
</body>

</html>