<!DOCTYPE html>
<html>
<head>
   <title>Assignment</title>
   <link rel="stylesheet" type="text/css" href="uplodstyle.css">
</head>

   <body>
      <div class="container">
      <form action="" method="POST" enctype="multipart/form-data">
         <h1>Upload Image  Here</h1>
         <input type="file" name="image"/>
         <br>
         <br>
         <input type="submit" id="submit" /><br>
         <br>
      </form>
      </div>
   </body>
</html>


<?php
   if(isset($_FILES['image'])){
      $errors= array();
      $file_name = $_FILES['image']['name'];
      $file_size = $_FILES['image']['size'];
      $file_tmp = $_FILES['image']['tmp_name'];
      $file_type = $_FILES['image']['type'];

      $file_ext=strtolower(end(explode('.',$_FILES['image']['name'])));
      
      $extensions= array("jpeg","jpg","png");
      
      if(in_array($file_ext,$extensions)=== false){
         $errors[]="file must be JPEG or PNG.";
      }
      
      if($file_size > 2097152) {
         $errors[]='File size must be excately 2 MB';
      }
      
      if(empty($errors)==true) {
         move_uploaded_file($file_tmp,"./upload/".$file_name);
         echo "Success";
      }else{
         print_r($errors);
      }
   }
?>

