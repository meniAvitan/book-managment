<?php
include 'config/app.php';
include 'includes/header.php';
include 'includes/navbar.php';

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/main.css">
    <title>Document</title>
</head>
<body>
<div class="py-5">
    <div class="container_main">
    <?php include ('message.php') ?>
        <h1>Home page</h1>
    </div>
</div>
</body>
</html>


<?php
include 'includes/footer.php';

?>