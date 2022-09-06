<?php
/*****************
 * 
 * MODEL
 * 
 * ***************/

include_once('header.php');

require_once('database/db_connect.php');

if ( isset($_POST['name']) && isset($_POST['email']) && isset($_POST['password'])) {

    $sql = "INSERT INTO users (name, email, password) 
            VALUES (:name, :email, :password)";
    // echo("<pre>\n".$sql."\n</pre>\n");
    $stmt = $pdo->prepare($sql);
    $stmt->execute(array(
        ':name' => $_POST['name'],
        ':email' => $_POST['email'],
        ':password' => $_POST['password']));

    header('location: /pdo_statements.php');
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