<?php

class Model{
    public function __construct()
    {
        $db = new DB_conection;
        $this->conn = $db->conn;
        
    }

    public function getProducts(){
        $data = null;
        $getProductQuery =  "  SELECT p.id, p.product_name, p.product_description, p.image_url, c.cat_name, 
        GROUP_CONCAT(c.cat_name) as all_cat 
        FROM products p LEFT JOIN products_categories pc ON p.id = pc.product_id 
        LEFT JOIN categories c ON c.id = pc.category_id GROUP BY p.id;  ";

        if($sql = $this->conn->query($getProductQuery)){
            while($row = mysqli_fetch_assoc($sql)){
                $data[] = $row;
            }
        }
        return $data;
    }

    // SELECT p.id, p.product_name, p.product_description, p.image_url, c.cat_name, 
    //     GROUP_CONCAT(c.cat_name) as all_cat
    //     FROM products p LEFT JOIN products_categories pc ON p.id = pc.product_id 
    //     LEFT JOIN categories c ON c.id = pc.category_id WHERE p.id = '10' 
    //SELECT p.id, p.product_name, p.product_description, p.image_url, c.cat_name FROM products p LEFT JOIN products_categories pc ON p.id = pc.product_id LEFT JOIN categories c ON c.id = pc.category_id

    // SELECT p.id, p.product_name, p.product_description, p.image_url, c.cat_name 
    //     FROM products p LEFT JOIN products_categories pc 
    //     ON p.id = pc.product_id LEFT JOIN categories c 
    //     ON c.id = pc.category_id 
    //     WHERE pc.category_id = '3' OR pc.category_id = '2'



    public function addBook(){
        if(isset($_POST['submit_book'])){
            $name = addslashes($_POST['product_name']);
            $description = addslashes($_POST['product_description']);
            $category = addslashes($_POST['category']);
           
        
            $image = $_FILES['image_url'];
            $fileName = $_FILES['image_url']['name'];
            $fileTmpName = $_FILES['image_url']['tmp_name'];
            $fileSize = $_FILES['image_url']['size'];
            $fileError = $_FILES['image_url']['error'];
        
            $fileExt = explode('.', $fileName);
            $fileActualExt = strtolower(end($fileExt));
        
            $allowed = array('jpg', 'jpeg', 'png');
        
            if(in_array($fileActualExt, $allowed)){
                if($fileError === 0){
                    if($fileSize < 500000){
                        $fileNameNew = uniqid('', true).".".$fileActualExt;
                        $fileDestination = 'uploades/'.$fileNameNew;
                        move_uploaded_file($fileTmpName,$fileDestination);
                        $image_db  = $fileNameNew;
                        
                    }else{
                        echo "Error! to big file";
                    }
                }else{
                    echo "Error uploading you file";
                }
            }
            else{
                echo "You cen't allow to upload this file";
            }
            $query = "INSERT INTO `products`( `product_name`, `product_description`, `image_url`, `cat_id`) VALUES ('$name','$description', '$image_db', $category)";
            $result = $this->conn->query($query);
            if($result){
                echo "<script>alert('You add new book successfuly!');</script>";
                echo "<script> window.location.href = 'products.php' </script>";
            }else{
                echo "<script>alert('Add book failed!');</script>";
                echo "<script> window.location.href = 'addBook.php' </script>";
            }
            return $result;

        }
        
        

    }

    public function edit($id){
        $data = null;
        $query = "SELECT * FROM `products` WHERE `id` = '$id'";
        if($sql = $this->conn->query($query)){
            while($row = $sql->fetch_assoc()){
                $data = $row;
            }
        }
        return $data;
    }

    public function updateBook($data){
        $fileTmpName = $_FILES['image_url']['tmp_name'];
        $fileSize = $_FILES['image_url']['size'];
        $fileError = $_FILES['image_url']['error'];
        $old_image = $_POST['old_image'];
        $edit_image = $_FILES['image_url']['name'];
        $fileExt = explode('.', $edit_image);
        $fileActualExt = strtolower(end($fileExt));
    
        $allowed = array('jpg', 'jpeg', 'png');
    
        if(in_array($fileActualExt, $allowed)){
            if($fileError === 0){
                if($fileSize < 10000000){
                    $fileNameNew = uniqid('', true).".".$fileActualExt;
                    $fileDestination = 'uploades/'.$fileNameNew;
                    move_uploaded_file($fileTmpName,$fileDestination);
                    $image_db  = $fileNameNew;
                    
                }else{
                    echo "Error! to big file";
                }
            }else{
                echo "Error uploading you file";
            }
        }
        else{
            echo "You cen't allow to upload this file";
        }
        $query = "UPDATE `products` SET `product_name`='$data[product_name]',
        `product_description`='$data[product_description]', `image_url` = '$image_db' WHERE `id` = '$data[id]'";
        $result = $this->conn->query($query);
        if($result) {
            // if($edit_image != ""){
            //     move_uploaded_file($_FILES['image_url']['tmp_name'],'uploades/'.$image_db);
            //     if(file_exists("../uploades/".$old_image)){
            //         unlink("../uploades/".$old_image);
            //     }

            // }
            // move_uploaded_file($_FILES['image_url']['tmp_name'],'uploades/'.$edit_image);
            return true;
        }else{
            return false;
        }
    }

    public function delete($id){
 
        $query = "DELETE FROM `products` where id = '$id'";
        if ($sql = $this->conn->query($query)) {
            return true;
        }else{
            return false;
        }
    }


    public function getCategories(){
        $data = null;
        $getCategoriesQuery =  "SELECT `id`, `cat_name` FROM `categories` ";
        if($sql = $this->conn->query($getCategoriesQuery)){
            while($row = mysqli_fetch_assoc($sql)){
                $data[] = $row;
            }
        }
        return $data;
    }
    public function getCategories2($product_id){
        $data = null;
        $getCategoriesQuery =  "SELECT p.id, c.cat_name ,
        GROUP_CONCAT(c.cat_name)
        FROM products p LEFT JOIN products_categories pc ON p.id = pc.product_id 
        LEFT JOIN categories c ON c.id = pc.category_id WHERE pc.product_id = '$product_id' ";
        if($sql = $this->conn->query($getCategoriesQuery)){
            while($row = mysqli_fetch_assoc($sql)){
                $data[] = $row;
            }
        }
        return $data;
    }
}

?>