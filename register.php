<?php
//session_start();
include_once "views/top.php"; 


 //include_once "views/header.php";     
 
 if(isset($_POST["submit"])){
    $username=$_POST["username"];
    $email=$_POST["email"];
    $password=$_POST["password"];
    
    $ret= registerUser($username,$email,$password);
    $message="";

        switch($ret){
            case "register success":
                $message="register success";
                setSession('username',$username);
                setSession('email',$email);
                if($username==="takoyaki" && $email==="takoyaki123@gmail.com"){
                    header("Location:admin.php");
                }else{
                    header("Location:index.php");
                }         
                break;
            case "email is already in use":
                $message="email is already in use";
                break;
            case "register fail":
                $message="register fail";
                break;
            case "fail":
                $message="authentication fail";
                break;
            default :break;
        }
        echo "<div class='container my-5'><div class='alert alert-warning alert-dismissible fade show' role='alert'>
        
        <button type='button' class='close' data-dismiss='alert' aria-label='Close>
          <span aria-hidden='true'>&times;</span>
        </button>
        " . $message . "
      </div></div>";

    
 }
    ?>
    <div class="container my-3">
    <div class="col-md-8 offset-md-2">
    <h2 class="text-center">Login to see special posts</h2>        
    <form action="register.php" class="form" method="post">
                <div class="form-group">
                    <label for="username" class="english">Username</label>
                    <input type="text" class="form-control english rounded-0" name="username" id="username">
                </div>
                <div class="form-group">
                    <label for="email" class="english">Email</label>
                    <input type="email" class="form-control english rounded-0" name="email" id="email">
                </div>
                <div class="from-group">
                    <label for="password" class="english">Password</label>
                    <input type="password" class="form-control english rounded-0" name="password" id="password">
                </div>
                <p></p>
                <div class="row no-gutters justity-content-end">
                <button class="btn btn-info" type="submit" value="submit" name="submit">Register</button>
                </div>
            </form>
       </div>
    </div>
    
    <?php include_once "views/footer.php";
          include_once "views/base.php";
    
    ?>
    