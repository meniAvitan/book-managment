<?php
include 'config/app.php';


//$auth->isLoggedIn();

include 'includes/header.php';
include 'includes/navbar.php';


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/view.css">
    <title>Document</title>
</head>
<body>
<div class="py-5">
    <div class="container">
        <div class="row justify-content-center">
                

                    <?php 
                   // include ('message.php');
                    include 'codes/model.php';
                    $model = new Model();
                    $id = $_GET['id'];
                    $row = $model->edit($id); 
                    
                    ?>

                <div class="container">
                    <div class="book_d">
                        <div class="book-text">
                            <p class="title">                            
                                <span> book name: </span>
                                <br>
                                <?php echo $row['product_name'] ?>
                            </p>
                            <p class="description">
                                <span> book description: </span>
                                <br>
                                <?php echo $row['product_description'] ?>
                            </p>
                            
                        </div>
                        <div class="book-img">
                            <img src="uploades/<?=$row["image_url"]?>" alt="<?php echo $row["product_name"]." image"?>">
                        </div>


                    </div>
                    <div class="book-action">
                        <a href="<?php base_url('updateBook.php');?>?id=<?php echo $row['id']; ?>">
                            <button class="btn bg-success">Edit</button>
                        </a>
                        <a href="<?php base_url('deleteBook.php');?>?id=<?php echo $row['id']; ?>">
                            <button class="btn bg-danger">Delete</button>
                        </a>
    
                    </div>
                </div>

            </div>
        
        
    </div>
</div>
</body>
</html>


<?php
include 'includes/footer.php';

?>