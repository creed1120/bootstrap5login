<?php
/*****************
 * 
 * MODEL
 * 
 * ***************/

include_once('header.php');

if ( isset($_POST["account"]) && isset($_POST["pw"]) ) {
    unset($_SESSION["account"]);  // Logout current user
    if ( $_POST['pw'] == 'F00tb@ll1120' ) {
        $_SESSION["account"] = $_POST["account"];
        $_SESSION["success"] = "You have been logged in successfully!";
        header( 'Location: app.php' );
        return;
    } else {
        $_SESSION["error"] = "Incorrect password.";
        header( 'Location: login.php' );
        return;
    }
}
?>

<?php
/*****************
 * 
 * PHP/HTML VIEW
 * 
 * ***************/

if ( ! isset($_SESSION["account"]) ) : ?>

    <section class="page-forms d-flex justify-content-center align-items-center vh-100 vw-100">
        <div class="container">
    
            <!--// SHOW FLASH MESSAGES IF PASSED IN ($_SESSION) //-->
            <?php if ( isset($_SESSION["error"]) ) : ?>
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <span><?php echo $_SESSION["error"]; ?></span>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            <?php unset($_SESSION["error"]); ?>
            <?php endif; ?>

            <?php if ( isset($_SESSION["success"]) ) : ?>
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <span><?php echo $_SESSION["success"]; ?></span>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            <?php unset($_SESSION["success"]); ?>
            <?php endif; ?>

            <div id="mobile-form-block" class="row m-auto">
                <div id="form-block" class="p-5 col-12 col-lg-6 order-2 order-lg-1 bg-dark">
                    <!-- <h3 class="text-white">Add New User</h3> -->
                    <form method="post">
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="name" name="account" placeholder="Name">
                            <label for="account">Name</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="password" class="form-control" id="password" name="pw" placeholder="password">
                            <label for="pw">Password</label>
                        </div>
                        <input class="btn btn-warning" type="submit" value="Login">
                    </form>
                </div>
                <div id="text-wrapper" class="p-5 bg-warning text-dark col-12 col-lg-6 order-1 order-lg-2 align-self-stretch">
                    <h2 id="form-h1">User Login</h2>

                    <!-- Javascript Options Flyour -->
                    <div id="the-box" class="the-box">
                        <a href="http://nike.com" target="_blank" class="btn btn-primary w-100">Visit Nike.com Today</a>
                    </div>

                    <p>Logins in a user that is found in the database.</p>
                    
                    <a class="hone" href="#">View Options</a>
                </div>
            </div>
        </div>
    </section>

<?php else : ?>
    <h3 style="margin-top:6em;">You are already logged in! Do you want to <a href="/logout.php">Logout</a></h3>
<?php endif; ?>

<?php include_once('footer.php'); ?>