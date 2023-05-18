<?php
// Include dbconnection
include_once("app/config/dbconnect.php");
?>

<!-- REGISTER PROCESS -->
<?php include('app/helpers/helper_Register.php') ?>

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
                            <h2 class="title1">REGISTER ADMIN</h2>
                        </div>
                        <div class="hr"></div>
                        <div class="form-body">
                            
                            <div class="form-group <?php echo (!empty($username_err)) ? 'has-error' : ''; ?>">
                                <label>USERNAME</label>
                                <input type="text" name="username" class="form-control" value="<?php echo $username; ?>">
                                <span class="help-block"><?php echo $username_err; ?></span>
                            </div>
                            <div class="form-group <?php echo (!empty($password_err)) ? 'has-error' : ''; ?>">
                                <label>PASSWORD</label>
                                <input type="password" name="password" class="form-control" value="<?php echo $password; ?>">
                                <span class="help-block"><?php echo $password_err; ?></span>
                            </div>
                            <div class="form-group <?php echo (!empty($confirm_password_err)) ? 'has-error' : ''; ?>">
                                <label>CONFIRM PASSWORD</label>
                                <input type="password" name="confirm_password" class="form-control" value="<?php echo $confirm_password; ?>">
                                <span class="help-block"><?php echo $confirm_password_err; ?></span>
                            </div>
                            <div class="form-group">
                                <input type="submit" name="submit_Register" class="btn btn-primary mt-2" value="Submit">
                                <input type="reset" name="reset" class="btn btn-danger mt-2" value="Reset">
                            </div>
                            <p class="mt-2">Already have an account? <a href="login.php">Login here</a>.</p>
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