<?php
include 'config/app.php';




?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/main.css">
</head>
<body>
<div class='cat_container'>
<?php
    include 'codes/model.php';
    $model = new Model();
    $categories = $model->getCategories();
?>
<?php 

foreach ($categories as $category) { 
?>

  <li class="book-title"><?php echo $category["cat_name"]?></li>
  <input type="hidden" name="id" value="<?php echo $category["id"]?>">

<?php }
?>
</div>
</body>
</html>