<?php
// Define variables and initialize with empty values
$username = $password = "";
$username_err = $password_err = "";

// Processing form data when form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Check if username is empty
    if (empty($_POST["username"])) {
        $username_err = "Please enter username.";
    } else {
        $username = ($_POST["username"]);
    }

    // Check if password is empty
    if (empty($_POST["password"])) {
        $password_err = "Please enter your password.";
    } else {
        $password = trim($_POST["password"]);
    }

    // Validate credentials
    if (empty($username_err) && empty($password_err)) {
        // Prepare a select statement
        $sql = "SELECT * FROM user WHERE user_name = '$username'";
        $result = mysqli_query($conn, $sql) or die();
        $row = mysqli_fetch_array($result);

        $idFetched = $row['user_id'];
        $usernameFetched = $row['user_name'];
        $passwordFetched = $row['user_password'];

        if ($username == $usernameFetched) {
            if ($password == $passwordFetched) {
                session_start();
                $_SESSION["loggedin"] = true;
                $_SESSION["id"] = $idFetched;
                $_SESSION["username"] = $usernameFetched;
                header("location: admin/index.php");
            } else {
                // Display an error message if password is not valid
                $password_err = "The password you entered was not valid.";
            }
        } // Display an error message if username doesn't exist
        $username_err = "No account found with that username.";
    }

    // Close connection
    mysqli_close($conn);
}
