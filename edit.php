<?php
/*****************
 * 
 * MODEL
 * 
 * ***************/

include_once('header.php');

require_once('database/db_connect.php');


if ( isset($_POST['name']) && isset($_POST['email'])
     && isset($_POST['password']) && isset($_POST['id']) ) {

    // Data validation
    if ( strlen($_POST['name']) < 1 || strlen($_POST['password']) < 1) {
        $_SESSION['error'] = 'Missing data';
        header("Location: edit.php?id=".$_POST['id']);
        return;
    }

    if ( strpos($_POST['email'],'@') === false ) {
        $_SESSION['error'] = 'Bad data';
        header("Location: edit.php?id=".$_POST['id']);
        return;
    }

    $sql = "UPDATE users SET name = :name,
            email = :email, password = :password
            WHERE id = :id";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(array(
        ':name' => $_POST['name'],
        ':email' => $_POST['email'],
        ':password' => $_POST['password'],
        ':id' => $_POST['id']));
    $_SESSION['success'] = 'Record updated';
    header( 'Location: index.php' ) ;
    return;
}

// Guardian: Make sure that id is present
if ( ! isset($_GET['id']) ) {
  $_SESSION['error'] = "Missing id";
  header('Location: index.php');
  return;
}

$stmt = $pdo->prepare("SELECT * FROM users where id = :xyz");
$stmt->execute(array(":xyz" => $_GET['id']));
$row = $stmt->fetch(PDO::FETCH_ASSOC);
if ( $row === false ) {
    $_SESSION['error'] = 'Bad value for id';
    header( 'Location: index.php' ) ;
    return;
}

// Flash pattern
if ( isset($_SESSION['error']) ) {
    echo '<p style="color:red">'.$_SESSION['error']."</p>\n";
    unset($_SESSION['error']);
}

$n = htmlentities($row['name']);
$e = htmlentities($row['email']);
$p = htmlentities($row['password']);
$id = $row['id'];

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
                            <input type="name" class="form-control" id="name" name="name" value="<?php echo $n ?>">
                            <label for="name">Name</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="email" class="form-control" id="email" name="email" value="<?php echo $e ?>">
                            <label for="email">Email address</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="password" class="form-control" id="password" name="password" value="<?php echo $p ?>">
                            <label for="password">Password</label>
                        </div>
                        <input type="hidden" name="id" value="<?php echo $id ?>">
                        <button type="submit" class="btn btn-warning">Update</button>
                        <a href="index.php" type="submit" class="btn btn-danger">Cancel</a>
                    </form>
                </div>
                <div class="p-5 bg-warning text-dark col-12 col-lg-6 order-1 order-lg-2 align-self-stretch">
                    <h2>Edit a User</h2>
                    <p>Updates a new user from database.</p>
                </div>
            </div>
        </div>
    </section>

<?php endif; ?>

<?php include_once('footer.php'); ?>