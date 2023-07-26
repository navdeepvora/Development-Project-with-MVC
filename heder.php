<?php
$mainurl="http://localhost/my-work/MVC/SHIVA/";
$baseurl="http://localhost/my-work/MVC/SHIVA/assets/";
?>



<!DOCTYPE html>
<html>

<head>
  <!-- Basic -->
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <!-- Mobile Metas -->
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <!-- Site Metas -->
  <meta name="keywords" content="" />
  <meta name="description" content="" />
  <meta name="author" content="" />

  <title>Shiva</title>
  <link rel="icon" href="<?php echo $baseurl;?>images/logo.png" type="type/x-icon">


  <!-- slider stylesheet -->
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.1.3/assets/owl.carousel.min.css" />

  <!-- bootstrap core css -->
  <link rel="stylesheet" type="text/css" href="<?php echo $baseurl;?>css/bootstrap.css" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <!-- bootstrap icon css -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
  <!-- fonts style -->
  <link href="https://fonts.googleapis.com/css?family=Baloo+Chettan|Poppins:400,600,700&display=swap" rel="stylesheet">
  <!-- Custom styles for this template -->
  <link href="<?php echo $baseurl;?>css/style.css" rel="stylesheet" />
  <!-- responsive style -->
  <link href="<?php echo $baseurl;?>css/responsive.css" rel="stylesheet" />
</head>

<body>

  <div class="hero_area">
    <!-- header section strats -->
    <header class="header_section">
      <div class="container-fluid">
        <nav class="navbar navbar-expand-lg custom_nav-container ">
          <a class="navbar-brand" href="<?php echo $mainurl;?>">
            <img src="<?php echo $baseurl;?>images/logo.png" alt="">
            <span>
            Shiva
            </span>
          </a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>

          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <div class="d-flex ml-auto flex-column flex-lg-row align-items-center">
              <ul class="navbar-nav">
                <li class="nav-item active">
                  <a class="nav-link" href="<?php echo $mainurl;?>">Home <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="<?php echo $mainurl;?>about-us"> About</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="<?php echo $mainurl;?>jewellery">Jewellery </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="<?php echo $mainurl;?>contact-us">Contact us</a>
                </li>
                                <?php
if(!isset($_SESSION["customer_id"])) {
    ?>
                <li class="nav-item">
                  <a class="nav-link" href="<?php echo $mainurl;?>login-us">Login</a>
                </li>
                <?php
} else {
    ?>
    <!-- <li class="nav-item">
    <a class="nav-link" href="#" data-toggle='modal' data-target="#log"><i class="bi bi-person-circle"></i></a>
  </li> -->
  <li class="nav-item dropdown"><a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#"><i class="bi bi-person-circle"></i><b class="text-success"><?php echo ucfirst($_SESSION["txt_name"]);?></b></a>
         
      <ul class="dropdown-menu" style="background-color:#0000; margin-left: -100px; min-width:250px ">

      <li class="nav-item">
         <a class="nav-link" href="<?php echo $mainurl;?>manageprofile"><span class="fa fa-users"></span> Manage Profile</a>
      </li>

      <li class="nav-item">
         <a class="nav-link" href="<?php echo $mainurl;?>manage-profile"> Manage Notification <span class="fa fa-bell"></span></a>
      </li>

      <li class="nav-item">
         <a class="nav-link" href="<?php echo $mainurl;?>manage-profile"> Manage Orders <span class="fa fa-truck"></span></a>
      </li>

      <li class="nav-item">
         <a class="nav-link" href="<?php echo $mainurl;?>changepassword-here"> Change Password <span class="fa fa-lock"></span></a>
      </li>

      <li class="nav-item">
      <a class="nav-link" href="<?php echo $mainurl;?>?delete-account-id=<?php echo $shwprof[0]["customer_id"];?>" onclick="return confirm('Are you sure to removed your Account ?')"> Delete Account <span class="fa fa-trash-o"></span></a>
      </li>

      <li class="nav-item p-2 ms-3">
      <a class="nav-link btn btn-sm btn-danger text-white" href="<?php echo $mainurl;?>?logout-custmor" onclick="return confirm('Are You Sure To Logout As Custmor')"> Logout here <span class="fa fa-power-off"></span></a>
      </li>
    
     </ul>
  
     </li>
                <?php
}
?>
              </ul>
            </div>
            <div class="quote_btn-container ">
            <?php
               if(!isset($_SESSION["customer_id"])) {
                   ?>
                <li class="mt-2"><i class="bi bi-cart fs-4"></i><a href="#"><span class="badge badge-danger top-0 start-100 translate-middle badge rounded-pill bg-danger">0</span></a></li>
                <?php
               } else {

                   ?>
                <li class="mt-2"><i class="bi bi-cart fs-4"></i><a href="<?php echo $mainurl;?>viewcart"><span class="badge badge-danger top-0 start-100 translate-middle badge rounded-pill bg-danger"><?php echo  [0]["total_count"];?></span></a></li>

                <?php
               }
?>
              <!-- <form class="form-inline">
                <button class="btn  my-2 my-sm-0 nav_search-btn" type="submit"></button>
              </form> -->
            </div>
          </div>
        </nav>
      </div>
    </header>

    <!-- end header section -->


    <script type="text/javascript" src="<?php echo $baseurl; ?>js/jquery-3.4.1.min.js"></script>
  <script type="text/javascript" src="<?php echo $baseurl; ?>js/bootstrap.js"></script>
  <script type="text/javascript" src="<?php echo $baseurl; ?>js/custom.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
</body>

</html>