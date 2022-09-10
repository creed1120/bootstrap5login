<?php
/*****************
 * 
 * MODEL ⬇ 
 * 
 * ***************/

include_once('header.php');

// require the pdo database connection
require_once('database/db_connect.php');

// echo "<pre>";
// $pdo = new PDO('mysql:host=127.0.0.1;dbname=loavertex', 'root', '');
$statement = $pdo->query("SELECT id, name, email, password FROM users");
// echo htmlentities($row['_message']);
// while ($row = $statement->fetch(PDO::FETCH_ASSOC)) {
//     print_r($row);
// }
// echo "</pre>";


if ( isset($_POST['name']) && isset($_POST['email'])
     && isset($_POST['password'])) {

    // Data validation
    if ( strlen($_POST['name']) < 1 || strlen($_POST['password']) < 1) {
        $_SESSION['error'] = 'Please enter valid Name and Password';

        echo $_POST['name'];

        header("Location: index.php");
        return;
    }

    if ( strpos($_POST['email'],'@') === false ) {
        $_SESSION['error'] = 'Please enter valid Email';
        header("Location: index.php");
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
/*******************
 * 
 * PHP/HTML VIEW ⬇ 
 * 
 * *****************/
?>

<?php
// Check if we are logged in!
if ( ! isset($_SESSION["account"]) ) : ?>

    <?php header('Location: login.php'); ?>

<?php else : ?>

    <div class="container" style="margin-top:8em;">
        <h2 id="form-h1" class="my-3">PDO mySql Statements from DB</h2>
    </div>

    <section class="section mt-5">
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

            <div class="table-responsive">
                <table class="table user-table m-0">
                    <thead>
                        <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Name</th>
                        <th scope="col">Email</th>
                        <th scope="col">Password</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php while ($row = $statement->fetch(PDO::FETCH_ASSOC)) : ?>
                            <tr>
                                <td><?php echo htmlentities($row['id']) ?></td>
                                <td><?php echo $row['name'] ?></td>
                                <td><a href="mailto:<?php echo $row['email'] ?>" target="_blank"><?php echo htmlentities($row['email']) ?></a></td>
                                <td><?php echo htmlentities($row['password']) ?></td>
                                <td>
                                    <a class="btn btn-warning" href="edit.php?id=<?php echo $row['id'] ?>">Edit</a>
                                </td>
                                <td>
                                    <a class="btn btn-danger" href="user_del.php?id=<?php echo $row['id'] ?>">Delete</a>
                                </td>
                            </tr>
                        <?php endwhile; ?>
                    </tbody>
                </table>
            </div>

            <div class="form-wrapper my-5">
                <div class="row g-0">
                    <div class="col-lg-4">
                        <form method="post" enctype="multipart/form-data">
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" id="name" name="name" placeholder="Name" value="">
                                <label for="name">Name</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" id="email" name="email" placeholder="name@example.com" value="">
                                <label for="email">Email address</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="password" class="form-control" id="password" name="password" placeholder="Password">
                                <label for="password">Password</label>
                            </div>
                            <button type="submit" name="submit" class="btn btn-warning">Add User</button>
                            <!-- <a href="index.php" type="submit" class="btn btn-danger">Cancel</a> -->
                        </form>
                    </div>
                </div>
            </div>

        </div>
    </section>
<?php  endif; ?>

<?php include_once('footer.php'); ?>