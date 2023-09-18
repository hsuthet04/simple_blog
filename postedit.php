<?php

include_once "views/top.php";

include_once "views/header.php";



$ppid=0;
if(isset($_GET["pid"])){
    $pid=$_GET["pid"];
    $ppid=$pid;
    $result=getSinglePost($pid);
    $posts=[];
    foreach($result as $item){
        $posts["title"]=$item["title"];
        $posts["writer"]=$item["writer"];
        $posts["imglink"]=$item["imglink"];
        $posts["content"]=$item["content"];
    }       
}
if(isset($_POST["submit"])){
    $file=$_FILES["file"];
    $imgname="";
    if($_FILES["file"]["name"]!=null){
        $imgname=mt_rand(time(),time())."_".$_FILES["file"]["name"];
        move_uploaded_file($_FILES["file"]["tmp_name"],"assets/uploads/".$imgname);
    }else{
       $imgname=$_POST["oldimg"];
    }
    $posttitle=$_POST["posttitle"];
    $posttype=$_POST["posttype"];
    $postwriter=$_POST["postwriter"];
    $postcontent=$_POST["postcontent"];
    $subject=$_POST["subject"];
    $imglink= $imgname;
    $pid=$_GET["pid"];
    echo $pid;
    updatePost($posttitle,$posttype,$postwriter,$postcontent,$imglink,$pid,$subject);
}
?>
<div class="container my-3">
       <div class="row">
           <?php
            include_once "views/sidebar.php";
            ?>

           <section class="col-md-9">
           <form method="post" action="postedit.php?pid=<?php echo $_GET["pid"]; ?>" enctype="multipart/form-data" class="mb-5 table-bordered p-5">
           <h3 class="text-center text-danger">Post Edit Here</h3>     
           <div class="form-group">
                <label for="posttitle">Title</label>
                <input type="text" class="form-control english" id="posttitle" name="posttitle" 
                value="<?php echo $posts["title"]; ?>">
               
                </div>
            <div class="form-group">
            <label for="posttype" class="english">Post type</label>
            <select class="form-control" id="posttype" name="posttype">
                <option value="1">Free</option>
                <option value="2">Paid</option>   
            </select>
            </div>
            <div class="form-group">
            <label for="subject" class="english">Subject</label>
            <select class="form-control" id="subject" name="subject">
                <?php
                $subjects=getAllSubject();
                foreach($subjects as $subject){
                    echo "<option value='".$subject["id"]."'>".$subject["name"]."</option>";
                }
                ?>
                
            </select>
            </div>
            <div class="form-group">
                <label for="postwriter">Post writer</label>
                <input type="text" class="form-text english" id="postwriter" name="postwriter"
                value="<?php echo $posts["writer"]; ?>">    
                </div>
            <div class="form-group">
            <label class="custom-file">
                 <input type="file" class="custom-file-input" id="file" name="file" multiple>
                 <input type="hidden" name="oldimg" 
                 value="<?php echo $posts["imglink"] ?>">
                 

            </label>
            </div>
            <div class="form-group">
            <label for="postcontent">Post Content</label>
            <textarea type="text" class="form-control" id="postcontent"
                rows="15" name="postcontent"> 
            <?php echo $posts["content"]; ?>
            </textarea>
            </div>
            <div class="row no-gutters justify-content-end">
                <button class="btn btn-outline primary mr-2">Cancel</button>
                <button type="submit" name="submit" class="btn btn-primary">Update</button>
            </div>
            <img src="assets/uploads/<?php echo $posts["imglink"]; ?>" alt="" class="img-fluid"> 
            </form>
           </section>
       </div>
   </div>
    
   <?php include_once "views/footer.php";
    include_once "views/base.php";

    ?>   