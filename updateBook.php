<?php
    include 'config/app.php';
    // include 'codes/auth.php';

    // $auth->isLoggedIn();

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



                <div class="card" style="margin-bottom: 3rem;">
                
                
                    <div class="card-header">
                    <h4>Update book</h4>
                    </div>
                    
                    <div class="card-body">
                        
                    <?php
                    include ('message.php');

                    include 'codes/model.php';
                    $model = new Model();
                    $id = $_GET['id'];
                    $row = $model->edit($id);
                    
                    if (isset($_POST['submit_update'])) {
                        if (isset($_POST['product_name']) && isset($_POST['product_description']) ) {
                        if (!empty($_POST['product_name']) && !empty($_POST['product_description']) ) {
                            
                            $data['id'] = $id;
                            $data['product_name'] = $_POST['product_name'];
                            $data['product_description'] = $_POST['product_description'];
                            $data['image_url'] = $_FILES['image_url']['name'];

                            

                            // if($data['image_url'] != ""){
                            //     $update_image = $data['image_url'];
                            // }else{
                            //     $update_image = $old_image;
                            // }


                    
                            $update = $model->updateBook($data);


                    
                            if($update){


                                echo "<script>alert('You updated a book successfuly!');</script>";
                                echo "<script> window.location.href = 'products.php' </script>";
                            }else{
                                echo "<script>alert('Add book failed!');</script>";
                                echo "<script> window.location.href = 'index.php' </script>";
                            }
                    
                        }else{
                            echo "<script>alert('empty');</script>";
                            header("Location: updateBook.php?id=$id");
                        }
                        }
                    }
                 ?>

                        <form action="" method="POST" enctype="multipart/form-data">
                        <input type="hidden" name="id" value="<?php echo $id; ?>">
                            <div class="md-3">
                                <label for="">Book Name</label>
                                <input type="text" name="product_name" class="form-control" value="<?php echo $row['product_name'] ?>">
                            </div>
                            <div class="md-3">
                                <label for="">Book Description</label>
                                <textarea name="product_description" id="" cols="10" rows="5" class="form-control"><?php echo $row['product_description'] ?></textarea>
                            </div>
                            <div class="md-3">
                                <label for="">Book Image</label>
                                <input type="file" name="image_url" class="form-control" id="image_url_update" >
                                <input type="hidden" name="old_image" value="<?php echo $row['image_url'] ?>">
                                <img class="old_image" src="./uploades/<?php echo $row['image_url'] ?>" alt="old image">
                            </div>

                            <div class="md-3 mt-3">
                                <button type="submit" name="submit_update" class="btn btn-primary">Update book</button>
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