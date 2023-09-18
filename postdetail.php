<?php
   
   include_once "views/top.php";
   
   include_once "views/header.php";
   
   if(isset($_GET['pid'])){
      $pid=$_GET["pid"];
      print_r($pid);

   }
   ?>
  <div class="container my-3">
      <div class="card col-md-5 offset-md-2">
         
         <?php
            $result=getSinglePost($pid);
            foreach($result as $data){
               echo '<div class="card-header">'.$data["title"].'<span>'.$data["created_at"].'</span></div>';
               echo '<img src="assets/uploads/'.$data["imglink"].'" alt="" class="img-fluid">';
               echo '<div class="card-block">'.$data["content"].'</div>';  
               echo '<div class="footer">'.$data["writer"].'</div>';  
            }

         ?>

      </div>
  </div>

  <?php include_once "views/footer.php";
   include_once "views/base.php";

   ?>