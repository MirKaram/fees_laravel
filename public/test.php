<?php
 $errors= array();

 echo isset($_FILES['image']['name']).'<\br>';

 $dir = "images/";
 $file_name = $_FILES['image']['name'];
 $file_name = $dir. $file_name;
 $file_size = $_FILES['image']['size'];
 $file_tmp = $_FILES['image']['tmp_name'];
 $file_type = $_FILES['image']['type'];
 $tmp = explode('.',$_FILES['image']['name']);
 $file_ext=strtolower(end($tmp));
 
 $extensions= array("jpeg","jpg","png","gif");
 
 if(in_array($file_ext,$extensions)=== false){
    $errors[]="extension not allowed, please choose a GIF, JPEG or PNG file.";
 }
 
 if($file_size > 2097152) {
    $errors[]='File size must be excately 2 MB';
 }
 
 if(empty($errors)==true) {
   try {
    move_uploaded_file($file_tmp, $file_name);
    echo "Success";
   } catch (Exception $th) {
    echo "error - ".$th->getMessage();
   }
   
 }else{
    print_r($errors);
 }

?>