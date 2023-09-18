<?php
require_once "system/session.php";
?>
<div class="container-fluid">
<nav class="container navbar navbar-expand-lg navbar-light bg-light">
  

  <a class="navbar-brand" href="index.php">Home</a>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav ml-auto">
    <li class="nav-item active">
        <a class="nav-link english" href="index.php">News</a>
      </li>
      <li class="nav-item active">
        <a class="nav-link english" href="filterpost.php?sid=1">Politic</a>
      </li>
      <li class="nav-item active">
        <a class="nav-link english" href="filterpost.php?sid=2">Wars</a>
      </li>

      <li class="nav-item">
        <a class="nav-link english" href="filterpost.php?sid=3">IT news</a>
      </li>
      <li class="nav-item">
        <a class="nav-link english" href="filterpost.php?sid=4">Social</a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="dropdown" role="button" data-toggle="dropdown">
        <?php
          if(checkSession("username")){
            echo getSession("username");
          }else{
            echo "Member";
          }
      ?>
        </a>
        <div class="dropdown-menu">
          <?php
             if(checkSession("username")){
             echo "<a class='dropdown-item' href='logout.php'>Log out</a>";
          }else{
            echo "<a class='dropdown-item' href='register.php'>Register</a>";
            echo "<a class='dropdown-item' href='login.php'>Login</a>";
          }
          ?>  
        </div>
      </li>
      <!-- <li class="nav-item">
        <a class="nav-link english" href="#">Disabled</a>
      </li> -->
    </ul>
    <!-- <form class="form-inline my-2 my-lg-0">
      <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
      <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
    </form> -->
  </div>
</nav>
</div>

