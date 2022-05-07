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
    <link rel="stylesheet" href="css/main.css">
    <title>Document</title>
</head>
<body>
<div class="py-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">

                <?php include ('message.php') ?>

                <div class="card" style="margin-bottom: 3rem;">
                    <div class="card-header">
                    <h4>Add new book</h4>
                    </div>
                    
                    <div class="card-body">
                        <?php
                            include 'codes/model.php';
                            $model = new Model();
                            $insert = $model->addBook();
                        ?>
                        <form action="" method="POST" enctype="multipart/form-data">
                            <div class="md-3">
                                <label for="">Book Name</label>
                                <input type="text" name="product_name" class="form-control">
                            </div>
                            <div class="md-3">
                                <label for="">Book Description</label>
                                <textarea name="product_description" id="" cols="10" rows="5" class="form-control"></textarea>
                            </div>
                            <div class="md-3">
                                <label for="">Book Description</label>
                                <select class="form-select" name="category" aria-label="Default select example">
                                    <option selected>Open this select menu</option>
                                    <option value="1">front-end</option>
                                    <option value="2">back-end</option>
                                    <option value="3">tech</option>
                                </select>
                            </div>
                            <div class="md-3">
                                <label for="">Book Image</label>
                                <input type="file" name="image_url" class="form-control" multiple>
                            </div>

                            <div class="md-3 mt-3">
                                <button type="submit" name="submit_book" class="btn btn-primary">Add book</button>
                            </div>
                        </form>
                </div>
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