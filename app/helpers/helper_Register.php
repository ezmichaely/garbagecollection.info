<?php
// Define variables and initialize with empty values
$username = $password = $confirm_password = "";
$username_err = $password_err = $confirm_password_err = "";

if (isset($_POST['reset'])) {
    $username = $password = $confirm_password = "";
    $username_err = $password_err = $confirm_password_err = "";
}

// Processing form data when form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $username = $_POST['username'];
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];

    // Validate username
    if (empty($_POST["username"])) {
        $username_err = "Please enter a username.";
    } else {
        // Prepare a select statement
        $sql = "SELECT * FROM user WHERE `user_name` = '$username'";
        $result = mysqli_query($conn, $sql) or die(mysqli_error($conn));

        while ($row = mysqli_fetch_array($result)) {
            $idCheck = $row['user_id'];
            $userCheck = $row['user_name'];
            $passCheck = $row['user_password'];

            if ($username == $userCheck) {
                $username_err = "This username is already taken.";
            } else {
                $username = $_POST["username"];
            }
        }
    }

    // Validate password
    if (empty($_POST["password"])) {
        $password_err = "Please enter a password.";
    } elseif (strlen($_POST["password"]) < 6) {
        $password_err = "Password must have atleast 6 characters.";
    } else {
        $password = $_POST["password"];
    }

    // Validate confirm password
    if (empty($_POST["confirm_password"])) {
        $confirm_password_err = "Please confirm password.";
    } else {
        $confirm_password = $_POST["confirm_password"];
        if (empty($password_err) && ($password != $confirm_password)) {
            $confirm_password_err = "Password did not match.";
        }
    }

    // Check input errors before inserting in database
    if (empty($username_err) && empty($password_err) && empty($confirm_password_err)) {

        // Prepare an insert statement
        $sql = "INSERT INTO user (user_name, user_password) VALUES ('$username', '$password');";
        $run = mysqli_query($conn, $sql);

        if (!$run) {
            echo ("Error:" . mysqli_error($conn));
        } else {
            echo "<script>alert('New user created!')</script>";
            echo "<script>window.open('login.php','_self')</script>";
        }
    }
    // Close connection
    mysqli_close($conn);
}
