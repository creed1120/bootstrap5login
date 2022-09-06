<?php
    date_default_timezone_set('America/Phoenix');

    $now = new DateTime();
    $next_week = new DateTime('today +1 week');

    // echo "Now: ". $now->format('Y-m-d') . "<br>";
    // echo "Next Week: " . $next_week->format('Y-m-d');
?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>YouTube Web Applications</title>

    <link rel="stylesheet" href="dist/css/app.css">
    <script src="dist/js/app.js"></script>

</head>
<body id="wrapper">

    <div class="container">
        <section class="my-5">
            <h2>Render PHP Output Below</h2>

            <hr>

            <?php echo "Now: ". $now->format('Y-m-d') . "<br>"; ?>
            <?php echo "Next Week: " . $next_week->format('Y-m-d'); ?>

        </section>
    </div>

</body>
</html>