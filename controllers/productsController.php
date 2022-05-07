<?php

class ProductController{
    public function __construct()
    {
        $db = new DB_conection;
        $this->conn = $db->conn;
        
    }

    public function getProducts(){
        $data = null;
        $getProductQuery =  "SELECT products.product_name, products.product_description, products.image_url, categories.cat_name 
        AS products FROM products LEFT JOIN categories 
        ON products.cat_id = categories.id;";

        if($sql = $this->conn->query($getProductQuery)){
            while($row = mysqli_fetch_assoc($sql)){
                $data[] = $row;
            }
        }
        return $data;
    }

    // public function addBook($name, $description, $image){
    //     $query = "INSERT INTO `products`( `product_name`, `product_description`, `image_url`) VALUES ('$name','$description', '$image')";
    //     $result = $this->conn->query($query);
    //     return $result;
    // }

    // public function edit($id){
    //     $data = null;
    //     $query = "SELECT * FROM `products` WHERE `id` = '$id'";
    //     if($sql = $this->conn->query($query)){
    //         while($row = $sql->fetch_assoc()){
    //             $data = $row;
    //         }
    //     }
    //     return $data;
    // }

    // public function updateBook($data){
    //     $query = "UPDATE `products` SET `product_name`='$data[product_name]',`product_description`='$data[product_description]',`image_url`='$data[book_image]' WHERE `id` = '$data[id]'";
    //     if ($sql = $this->conn->query($query)) {
    //         return true;
    //     }else{
    //         return false;
    //     }
    // }

}

?>