<?php 
          
          include_once "views/top.php"; 
                 
          
          
          //include_once "views/header.php";    
          
          if(isset($_POST["submit"])){
            
            $email=$_POST["email"];
            $password=$_POST["password"];

            $ret=loginUser($email,$password);
            $message="";
            // print_r(getSession("username"));
            // print_r(getSession("email"));
            switch($ret){
                case "login success":
                    $message="login success";
                    if(getSession("username") == "takoyaki" && getSession("email")=='takoyaki123@gmail.com'){
                        header("Location:admin.php");
                    }else{
                        header("Location:index.php");
                    }
                    break;
                case "login fail":
                    $message="login fail";
                    break;
                case "auth fail":
                    $message="username and format not in format";
                    break;
                default:
            }
            echo "<div class='container my-5'><div class='alert alert-warning alert-dismissible fade show' role='alert'>
            
            ".$message."
          </div></div>";
         
        
        }
    ?>
    <div class="container my-3">
    <div class="col-md-8 offset-md-2">
    <h2 class="text-center">Login to see special posts</h2>        
    <form action="login.php" class="form" method="post">
                <div class="form-group">
                    <label for="email" class="english">Email</label>
                    <input type="email" class="form-control english rounded-0" name="email" id="email">
                </div>
                <div class="from-group">
                    <label for="password" class="english">Password</label>
                    <input type="password" name="password" class="form-control english rounded-0" id="password">
                </div>
                <p></p>
                <div class="row no-gutters justity-content-end">
                <button class="btn btn-info" type="submit" value="submit" name="submit">Login</button>
                </div>
            </form>
       </div>
    </div>
    
    <?php include_once "views/footer.php";
          include_once "views/base.php";
    
    ?>
    