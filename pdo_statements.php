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

<?php if ( !isset( $_SESSION["account"] ) ) : ?>

    <?php header('Location: login.php'); ?>

<?php else : ?>
    <div class="container" style="margin-top:8em;">
        <h2 class="my-3">PDO mySql Statements from DB</h2>
    </div>
    <section class="section mt-5">
        <div class="container">
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
                                    <form method="post" action="post_delete.php">
                                        <input type="hidden" name="id" value="<?php echo $row['id'] ?>">
                                        <input class="btn btn-danger" type="submit" name="delete" value="Delete">
                                    </form>
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