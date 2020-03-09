  <?php 
  
    include('admin/incoporate/header.php');
    require_once 'admin/controllers/authController.php'; 
?>
<body class="bg-gradient-primary">
 <div class="container">
    <div class="card o-hidden border-0 shadow-lg my-5">
      <div class="card-body p-0">
        <!-- Nested Row within Card Body -->
        <div class="row">
          <div class="col-lg-5 d-none d-lg-block bg-login-image"></div>
          <div class="col-lg-7">
            <div class="p-5">
              <div class="text-center">
                <h1 class="h4 text-gray-900 mb-4">Create an Account!</h1>
              <form action="signup.php" class="user" method="post">
                <?php if(count($errors)>0): ?>
                <div class="alert alert-danger">
                  <?php foreach($errors as $error): ?>
                    <li><?php echo $error; ?></li>
                     <?php endforeach; ?>
                   </div>
                <?php endif; ?>
                <div class="form-group row">
                  <div class="col-sm-6 mb-3 mb-sm-0">
                    <input type="text" class="form-control form-control-user" id="fname" name="fname" placeholder="First Name"value="<?php echo $fname; ?>">
                  </div>
                  <div class="col-sm-6">
                    <input type="text" class="form-control form-control-user" id="lname" name="lname" placeholder="Last Name" value="<?php echo $lname; ?>">
                  </div>
                </div>
                <div class="form-group">
                  <input type="email" class="form-control form-control-user" id="email" name="email" placeholder="Email Address" value="<?php echo $email; ?>">
                </div>
                <div class="form-group row">
                  <div class="col-sm-6 mb-3 mb-sm-0">
                    <input type="password" class="form-control form-control-user" name="password" placeholder="Password">
                  </div>
                  <div class="col-sm-6">
                    <input type="password" class="form-control form-control-user"  name="confpassword" placeholder="Confirm Password">
                  </div>
                </div>
                <button type="submit" name="signup-btn" class="btn btn-primary btn-block btn-lg">Register acount</button>
                 
               <hr class="my-4">
      
              </form>
              <hr>
              <div class="text-center">
                <a class="small" href="forgot-password.php">Forgot Password?</a>
              </div>
              <div class="text-center">
                <a class="small" href="login.php">Already have an account? Login!</a>
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
   
    include('admin/incoporate/scripts.php');
 ?>
