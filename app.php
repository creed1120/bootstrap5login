<?php
/*****************
 * 
 * MODEL
 * 
 * ***************/

include_once('header.php');
?>

<?php
// Check if we are logged in!
if ( ! isset($_SESSION["account"]) ) : ?>

    <?php header('Location: login.php') ?>

<?php else : ?>

    <header class="masthead bg-primary text-white text-center">

        <?php if ( isset($_SESSION["success"]) ) : ?>
            <div class="container">
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong><?php echo $_SESSION["success"]; ?></strong>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            </div>
        <?php unset($_SESSION["success"]); ?>

    <?php endif; ?>

        <div class="container d-flex align-items-center flex-column">
            <!-- Masthead Avatar Image-->
            <img class="masthead-avatar mb-5" src="assets/images/avataaars.svg" alt="..." />
            <!-- Masthead Heading-->
            <h1 class="masthead-heading text-uppercase mb-0">Start Bootstrap</h1>
            <!-- Icon Divider-->
            <div class="divider-custom divider-light">
                <div class="divider-custom-line"></div>
                <div class="divider-custom-icon"><i class="fas fa-star"></i></div>
                <div class="divider-custom-line"></div>
            </div>
            <!-- Masthead Subheading-->
            <p class="masthead-subheading font-weight-light mb-0">Graphic Artist - Web Designer - Illustrator</p>
        </div>
    </header>

<?php endif ?>

<?php include_once('footer.php'); ?>