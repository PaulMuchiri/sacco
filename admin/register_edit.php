<?php 
     session_start();
    include('incoporate/header.php');
    include('incoporate/navbar.php');
   
?>
<div class="container-fluid">
  
  <!--data table-->
  <div class="card shadow mb-4">
    <div class="card-head py-3">
      <h6 class="m-0 font-weight-bold text-primary"> Edit Admin profile
</h6>
    </div>

    <div class="modal-body">
    	<?php 
    		 $connection = mysqli_connect("localhost","root","","saccoweb");
		 if (isset($_POST['edit_btn'])) {
			$id = $_POST['edit_id'];
			$sql = "SELECT * FROM register WHERE id = '$id'";
			$run_sql = mysqli_query($connection, $sql);

			foreach($run_sql as $row){
				?>
        <form action="code.php" method="POST">
          <input type="hidden" name="edit_id" value="<?php echo $row['id'] ?>">
        <div class="form-group">
          <label><i>Username</i></label>
          <input type="text" value="<?php echo $row['username'] ?>" name="edit_username" class="form-control" placeholder="Enter Username">
        </div>

        <div class="form-group">
          <label><i>Email</i></label>
          <input type="email" value="<?php echo $row['email'] ?>" name="edit_email" class="form-control" placeholder="Enter Email">
        </div>

        <div class="form-group">
          <label><i>Password</i></label>
          <input type="password" value="<?php echo $row['password'] ?>" name="edit_password" class="form-control" placeholder="Enter Password">
        </div>
        <a href="register.php" class="btn btn-danger"><i>Cancle</i></a>
        <button type="submit" name="update_btn" class="btn btn-primary">Update</button>
      </form>

        <?php
        }
      }
   ?>
      </div>
  </div>
</div>

<?php 
    include('incoporate/footer.php');
    include('incoporate/scripts.php');
 ?>
