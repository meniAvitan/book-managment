<?php
include 'config/app.php';
include 'codes/auth.php';

$auth->isLoggedIn();

include 'includes/header.php';
include 'includes/navbar.php';
//include 'includes/categories.php';


?>

<!DOCTYPE html>
<html>
  <head>
    <title>Products Demo Page</title>
 
    <!-- (A) CSS & JS -->
    <link href="css/products.css" rel="stylesheet">
    
  </head>
  <body>
    <div class='cat_container'>
      <?php
          include 'codes/model.php';
          $model = new Model();
          
          $books = $model->getProducts();
          $product_id = 10;
          $categories = $model->getCategories();
      ?>
      <div class="cat">
      <?php 

      foreach ($categories as $category) { 
      ?>
        <div class="category_list category-common category-<?php echo $category['cat_name'] ?>">
          <h6><?php echo $category["cat_name"]?></h6>
        </div>
        <input type="hidden" name="id" value="<?php echo $category["id"]?>">



      <?php }
      ?>
      </div>
    </div>
    <!-- (B) BOOKS LIST -->
    <div class="title">
    <h1 >OUR BOOKS</h1>
    </div>
    
    <div class="addProduct">
        <a href="<?php base_url('addBook.php'); ?>">
            <button class="btn btn-primary m-3">add book</button>
        </a>   
    </div>
    <div id="our-books">
        <?php 

      foreach ($books as $book) { ?>
      <div class="book-wrap" data-id="<?php echo $book["id"]?>">
      <!-- <div class="category-common category-<?php echo $book['cat_name'] ?>"> -->
       <?php
          $inputCaregories = $book['all_cat'];
          $bs = explode(',', $inputCaregories);

       ?>
       <div class="category_list ">
          <?php foreach($bs as $b){ ?>
            <div class="cat_s category-<?php echo $book['all_cat'] ?>"><?php echo $b; ?></div>
          
          <?php }   ?>
        </div>

        <!-- <h6><?php echo $book['cat_name'] ?></h6>
      </div> -->
        <div class="book-img">
            <img src="uploades/<?=$book["image_url"]?>" alt="<?php echo $book["product_name"]." image"?>">
        </div>

        <div class="book-title"><?php echo $book["product_name"]?></div>
        <div class="book-desc"><?php echo $book["product_description"]?></div>

        <div class="book-action">
            <a href="<?php base_url('updateBook.php');?>?id=<?php echo $book['id']; ?>">
                <button class="btn bg-success">Edit</button>
            </a>
            <a href="<?php base_url('deleteBook.php');?>?id=<?php echo $book['id']; ?>">
                <button class="btn bg-danger">Delete</button>
            </a>
            <a href="<?php base_url('viewBook.php');?>?id=<?php echo $book['id']; ?>">
                <button class="btn btn-primary">view</button>
            </a>
            
            
        </div>
      </div>
      <?php }
    ?>
    </div>

    <div class="footer"></div>
    <script src="js/products.js"></script>
  </body>
</html>