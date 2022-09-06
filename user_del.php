<?php

include_once('header.php');

require_once('database/db_connect.php');

if ( isset($_POST['delete']) && isset($_POST['id']) ) {
    $sql = "DELETE FROM users WHERE id = :id";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(array(':id' => $_POST['id']));
    $_SESSION['success'] = 'Record deleted';
    header( 'Location: index.php' ) ;
    return;
}

// Guardian: Make sure that user_id is present
if ( ! isset($_GET['id']) ) {
  $_SESSION['error'] = "Missing id";
  header('Location: index.php');
  return;
}

$stmt = $pdo->prepare("SELECT name, id FROM users where id = :xyz");
$stmt->execute(array(":xyz" => $_GET['id']));
$row = $stmt->fetch(PDO::FETCH_ASSOC);
if ( $row === false ) {
    $_SESSION['error'] = 'Bad value for id';
    header( 'Location: index.php' ) ;
    return;
}

?>

    <section class="my-5 mx-2">
        <div class="container">
            
            <h2>Render PHP Output Below</h2>
            <hr>
            <div class="row m-auto">
                <div class="p-5 col-12 col-lg-6 order-2 order-lg-1 bg-dark">
                    <!-- <h3 class="text-white">Add New User</h3> -->
                    <form method="post">
                        <input type="hidden" name="id" value="<?php echo $row['id'] ?>">
                        <input type="submit" value="Delete" name="delete">
                    </form>
                </div>
                <div class="p-5 bg-warning text-dark col-12 col-lg-6 order-1 order-lg-2 align-self-stretch">
                    <h2>Delete a user</h2>
                    <p>Deletes a user from the database.</p>
                </div>
            </div>
        </div>
    </section>

<?php include_once('footer.php'); ?>