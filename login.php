<?php
//dbconnection
include_once("app/config/dbconnect.php");

// Check if the user is already logged in, if yes then redirect him to welcome page
if (isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true) {
    header("location: admin/index.php");
    exit;
}
?>

<!-- LOG IN PROCESS -->
<?php include('app/helpers/helper_Login.php') ?>

<!-- HEAD -->
<?php include('app/includes/homepage/head.php'); ?>

<body id="loginBody">
    <!-- HEADER -->
    <header class="brand container-fluid" id="login">
        <div class="container">
            <img src="assets/images/logo/gc_brand.png" alt="site-logo" class="" />
        </div>
    </header>

    <main class="container" id="login">
        <div class="row">
            <div class="col-lg-12">
                <div class="login-form">
                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                        <div class="form-title">
                            <img src="assets/images/icons/male_user_104px.png" alt="" />
                            <h2 class="title1">LOG IN</h2>
                        </div>
                        <div class="hr"></div>
                        <div class="form-body">
                            <div class="form-group <?php echo (!empty($username_err)) ? 'has-error' : ''; ?>">
                                <label>USERNAME</label>
                                <input type="text" name="username" class="form-control" value="<?php echo $username; ?>">
                                <span class="help-block"><?php echo $username_err; ?></span>
                            </div>
                            <div class="form-group mt-1 <?php echo (!empty($password_err)) ? 'has-error' : ''; ?>">
                                <label>PASSWORD</label>
                                <input type="password" name="password" class="form-control">
                                <span class="help-block"><?php echo $password_err; ?></span>
                            </div>
                            <div class="form-group mt-3">
                                <input type="submit" name="submit_Login" class="btn btn-primary" value="LOGIN">
                            </div>
                            <p class="mt-2">Don't have an account? <a href="register.php">Sign up now</a>.</p>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </main>

    <!-- FOOTER -->
    <?php include('app/includes/homepage/footer.php'); ?>

    <!-- SCRIPT -->
    <?php include('app/includes/homepage/script.php'); ?>
</body>

</html>