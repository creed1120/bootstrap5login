<?php
/*****************
 * 
 * MODEL
 * 
 * ***************/

include_once('header.php');

require_once('database/db_connect.php');

if ( isset($_POST['name']) && isset($_POST['email'])
     && isset($_POST['password'])) {

    // Data validation
    if ( strlen($_POST['name']) < 1 || strlen($_POST['password']) < 1) {
        $_SESSION['error'] = 'Please enter valid Name and Password';
        header("Location: add.php");
        return;
    }

    if ( strpos($_POST['email'],'@') === false ) {
        $_SESSION['error'] = 'Please enter valid Email';
        header("Location: add.php");
        return;
    }

    $sql = "INSERT INTO users (name, email, password)
              VALUES (:name, :email, :password)";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(array(
        ':name' => $_POST['name'],
        ':email' => $_POST['email'],
        ':password' => $_POST['password']));
    $_SESSION['success'] = 'Record Added';
    header( 'Location: index.php' ) ;
    return;
}
?>

<?php
/*****************
 * 
 * PHP/HTML VIEW
 * 
 * ***************/

if ( !isset($_SESSION["account"]) ) : ?>

    <?php header('Location: login.php'); ?>

<?php else : ?>

    <div class="container" style="margin-top:8em;">
        <h2 class="py-3">Render PHP Output Below</h2>
    </div>
    <section class="page-forms">
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

            <div class="row m-auto">
                <div class="p-5 col-12 col-lg-6 order-2 order-lg-1 bg-dark">
                    <!-- <h3 class="text-white">Add New User</h3> -->
                    <form action="#" method="post">
                        <div class="form-floating mb-3">
                            <input type="name" class="form-control" id="name" name="name" placeholder="Name">
                            <label for="name">Name</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="email" class="form-control" id="email" name="email" placeholder="name@example.com">
                            <label for="email">Email address</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="password" class="form-control" id="password" name="password" placeholder="Password">
                            <label for="password">Password</label>
                        </div>
                        <button type="submit" class="btn btn-warning">Submit</button>
                        <a href="index.php" type="submit" class="btn btn-danger">Cancel</a>
                    </form>
                </div>
                <div class="p-5 bg-warning text-dark col-12 col-lg-6 order-1 order-lg-2 align-self-stretch">
                    <h2>Add a User</h2>
                    <p>Adds a new user into database.</p>
                </div>
            </div>
        </div>
    </section>

<?php endif; ?>

<?php include_once('footer.php'); ?>