<?php

include_once "views/top.php";

include_once "views/header.php";



  if(isset($_POST['submit'])){
    $posttitle=$_POST["posttitle"];
    $posttype=$_POST["posttype"];
    $postwriter=$_POST["postwriter"];
    $postcontent=$_POST["postcontent"];

    // echo "Post title is ".$posttitle."<br>";
    // echo "Post type is ".$posttype."<br>";
    // echo "Post writer is ".$postwriter."<br>";
    // echo "Post content is ".$postcontent."<br>";
    $imglink=mt_rand(time(),time()) ."_" . $_FILES["file"]["name"] . mt_rand(time(),time());
    move_uploaded_file($_FILES['file']['tmp_name'],'assets/uploads/'.$imglink);
    
    $bol=insertPost($posttitle,$posttype,$postwriter,$postcontent,$imglink,$subject);
    if($bol){
        echo "<div class='container my-5'><div class='alert alert-warning alert-dismissible fade show' role='alert'>
            
            Post successfully inserted
          </div></div>";
    }else{
        echo "<div class='container my-5'><div class='alert alert-warning alert-dismissible fade show' role='alert'>
        Post inserted fail</div>";
    }
}

?>

<div class="container my-3">
       <div class="row">
           <?php
            include_once "views/sidebar.php";
            ?>
           
           <section class="col-md-9">
            <div class="card">
                <?php
                    $result=getAllPost(2,1);

                    foreach($result as $post){
                        echo '<div class="card mb-3">
                            <div class="card-block">
                            <h5>'.$post["title"].'</h5>
                            <p>'.substr($post["content"],0,100).'</p>
                            <a class="btn btn-primary float-end" href="postedit.php?pid=' . $post["id"] . '">Edit</a>
                        
                        
                        </div></div>';
                    }
                
                ?>
            </div>
            
           </section>
       </div>
   </div>
    
   <?php include_once "views/footer.php";
    include_once "views/base.php";

    ?>