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
?>

<?php
/*****************
 * 
 * PHP/HTML VIEW ⬇ 
 * 
 * ***************/
?>

<?php
// Check if we are logged in!
if ( ! isset($_SESSION["account"]) ) : ?>

    <?php header('Location: login.php'); ?>

<?php else : ?>

    <div class="container" style="margin-top:8em;">
        <h2 class="my-3">PDO mySql Statements from DB</h2>
    </div>

    <section class="section mt-5">
        <div class="container">

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
                                <td><?php echo $row['id'] ?></td>
                                <td><?php echo $row['name'] ?></td>
                                <td><a href="mailto:<?php echo $row['email'] ?>" target="_blank"><?php echo $row['email'] ?></a></td>
                                <td><?php echo $row['password'] ?></td>
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
        </div>
    </section>
<?php  endif; ?>

<?php include_once('footer.php'); ?>