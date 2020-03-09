<?php 
    include('incoporate/header.php');
    require_once 'controllers/authController.php'; 
?>
<body class="">

  <div class="container">

    <!-- Outer Row -->
    <div class="row justify-content-center">

      <div class="col-xl-4 col-lg-4 col-md-4">

        <div class="card o-hidden border-0 shadow-lg my-5">
          <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div class="row">
              <div class="col-lg-6 d-none d-lg-block bg-login-image"></div>
              <div class="col-lg-12">
                <div class="p-5">
                  <div class="text-center">
                    <h1 class="h4 text-gray-900 mb-4">Sign in</h1>
                    	 <?php
				      if (isset($_SESSION['success']) && $_SESSION['success']!='') {
				       echo'<h2>'.$_SESSION['success'].'</h2>';
				       unset($_SESSION['success']);
				      }
				      if (isset($_SESSION['status']) && $_SESSION['status']!='') {
				       echo'<h2 class="bd-info">'.$_SESSION['status'].'</h2>';
				       unset($_SESSION['status']);
				     }
				      ?>
                  </div>
                  <form class="user">
                    <div class="form-group">
                      <input type="email" class="form-control form-control-user" placeholder="Email Address..." name="email" required="">
                    </div>
                    <div class="form-group">
                      <input type="password" class="form-control form-control-user" placeholder="Password" name="password" required="">
                    </div>
                
                    <button type="submit" class="btn btn-primary btn-user btn-block" name="login_btn">
                      Login
                    </button>
                    
                  </form>
                  <hr>
                  
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

      </div>

    </div>

  </div>
</body>

  <?php 
   
    include('incoporate/scripts.php');
 ?>
