<?php
/***
 *        __  ____    ________   ____        __  __                
 *       /  |/  / |  / / ____/  / __ \____ _/ /_/ /____  _________ 
 *      / /|_/ /| | / / /      / /_/ / __ `/ __/ __/ _ \/ ___/ __ \
 *     / /  / / | |/ / /___   / ____/ /_/ / /_/ /_/  __/ /  / / / /
 *    /_/  /_/  |___/\____/  /_/    \__,_/\__/\__/\___/_/  /_/ /_/ 
 *                                                                 
 */

require_once('database/db_connect.php');

    if ( isset($_POST['id']) ) {

        $sql = "DELETE FROM users WHERE ID = :id";
        // echo("<pre>\n".$sql."\n</pre>\n");
        $stmt = $pdo->prepare($sql);
        $stmt->execute(array(
            ':id' => $_POST['id']
        ));
    };

include_once('header.php');
?>

    <section class="my-5 mx-2">
        <div class="container">
            
            <h2>Render PHP Output Below</h2>
            <hr>
            <div class="row m-auto">
                <div class="p-5 col-12 col-lg-6 order-2 order-lg-1 bg-dark">
                    <!-- <h3 class="text-white">Add New User</h3> -->
                    <form action="#" method="post">
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="user_id" name="id" placeholder="user id">
                            <label for="id">User ID</label>
                        </div>
                        <input type="submit" class="btn btn-primary">Submit</input>
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