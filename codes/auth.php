<?php
//include 'config/app.php';
include_once 'controllers/RegisterConroller.php';
include_once 'controllers/LoginController.php';
include_once 'controllers/productsController.php';
$auth = new LoginController;




// $products = new ProductController;
// $books = $products->getProducts();

    // $id = mysqli_real_escape_string($db->conn, $_GET['id']);
    // $update_row = $products->edit($id);



//add new book
// if(isset($_POST['submit_book'])){
//     $name = validateInput($db->conn, $_POST['product_name']);
//     $description = validateInput($db->conn, $_POST['product_description']);
   

//     $image = $_FILES['book_image'];
//     $fileName = $_FILES['book_image']['name'];
//     $fileTmpName = $_FILES['book_image']['tmp_name'];
//     $fileSize = $_FILES['book_image']['size'];
//     $fileError = $_FILES['book_image']['error'];
//     $fileType = $_FILES['book_image']['type'];

//     $fileExt = explode('.', $fileName);
//     $fileActualExt = strtolower(end($fileExt));

//     $allowed = array('jpg', 'jpeg', 'png');

//     if(in_array($fileActualExt, $allowed)){
//         if($fileError === 0){
//             if($fileSize < 500000){
//                 $fileNameNew = uniqid('', true).".".$fileActualExt;
//                 $fileDestination = 'uploades/'.$fileNameNew;
//                 move_uploaded_file($fileTmpName,$fileDestination);
//                 $image_db  = $fileNameNew;
                
//             }else{
//                 echo "Error! to big file";
//             }
//         }else{
//             echo "Error uploading you file";
//         }
//     }
//     else{
//         echo "You cen't allow to upload this file";
//     }

//     $add = $products->addBook($name, $description, $image_db);
//     if($add){
//         redirect("You add new book successfuly", "products.php");
//     }else{
//         redirect("Add book failed!", "addBook.php");
//     }
// }

//update a book

// if (isset($_POST['update_book'])) {
//     if (isset($_POST['product_name']) && isset($_POST['product_description']) && isset($_POST['book_image'])) {
//       if (!empty($_POST['product_name']) && !empty($_POST['product_description']) ) {
         
//         $data['id'] = $id;
//         $data['product_name'] = $_POST['product_name'];
//         $data['product_description'] = $_POST['product_description'];
//         $data['book_image'] = $_POST['book_image'];

//         $update = $products->updateBook($data);
//         var_dump($update);

//         if($update){
//             redirect("You updated a book successfuly", "products.php");
//         }else{
//             echo "<h1>error</h1>";
//             redirect("updated book failed!", "index.php");
//         }

//       }else{
//         echo "<script>alert('empty');</script>";
//         header("Location: updateBook.php?id=$id");
//       }
//     }
//   }

//login auth

if(isset($_POST['login_btn'])){
    $email = validateInput($db->conn, $_POST['email']);
    $password = validateInput($db->conn, $_POST['password']);

    

    $checkLogin = $auth->userLogin($email, $password);
    if($checkLogin){
        redirect("Login successfuly", "index.php");
    }
    else{
        echo "<h1>Invalid email or password</h1>";
        redirect("Invalid email or password", "login.php");
    }
}

//reguster auth

if(isset($_POST['register_btn'])){
    $fname = validateInput($db->conn, $_POST['fname']);
    $lname = validateInput($db->conn, $_POST['lname']);
    $email = validateInput($db->conn, $_POST['email']);
    $password = validateInput($db->conn, $_POST['password']);
    $confirm_password = validateInput($db->conn, $_POST['confirmPassword']);

    $register = new RegisterController;

    $result_password = $register->confirmPassword($password, $confirm_password);
    if($result_password)
    {
        $result_user = $register->IsUserExists($email);
        if($result_user)
        {
            echo "<h1>already email exists</h1>";
        }
        else
        {
            $register_query = $register->registration($fname, $lname, $email, $password);
            if($register_query){
                redirect("Regisrated successfuly", "login.php");
            }else{
                redirect("something went wrong", "register.php");
            }
        }
    }
    else 
    {
        echo "<h1>Password and confirm password are not match</h1>";
        //redirect("Password and confirm password are not match", "register.php");
    }


}

?>