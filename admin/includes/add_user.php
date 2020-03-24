<?php  

  if (isset($_POST['create_user'])) {
      $user_name = $_POST['user_name'];
      $user_fname = $_POST['user_fname'];
      $user_lname = $_POST['user_lname'];
      $user_email = $_POST['user_email'];
      $user_password = $_POST['user_password'];
      $user_role = $_POST['user_role'];

      $user_image = $_FILES['user_image']['name'];
      $user_image_temp = $_FILES['user_image']['tmp_name'];
      
      move_uploaded_file($user_image_temp, "../images/$user_image");

      $query = "INSERT INTO  users(user_name, user_fname, user_lname, user_email, user_password, user_image, user_role) VALUES('$user_name', '$user_fname', '$user_lname', '$user_email', '$user_password', '$user_image', '$user_role') ";

      $create_user_query = mysqli_query($connection, $query);

      confirm_query($create_user_query);

      header("Location: users.php");
  }

?>




<div class="card">
  <div class="card-header">
    <h3>Add New User</h3>
  </div>
  <div class="card-body">
    
    <form action="" method="post" enctype="multipart/form-data">
      <div class="form-group">
        <label for="user_name">User Name</label>
        <input type="text" class="form-control" name="user_name">
      </div>
      <div class="form-group">
        <label for="user_fname">First Name</label>
        <input type="text" class="form-control" name="user_fname">
      </div>
      <div class="form-group">
        <label for="user_lname">Last Name</label>
        <input type="text" class="form-control" name="user_lname">
      </div>
      <div class="form-group">
        <label for="user_email">Email</label>
        <input type="text" class="form-control" name="user_email">
      </div>
      <div class="form-group">
        <label for="user_password">Passsword</label>
        <input type="password" class="form-control" name="user_password">
      </div>
      <div class="form-group">
        <label for="post_category">User Role</label><br>
        <select name="user_role" id="">

            <option>Admin</option>
            <option>Subscriber</option>

        </select>
      </div>
      
      <div class="form-group">
        <label for="user_image">Image</label>
        <input type="file"  name="user_image">
      </div>
      
      <div class="form-group">
        <input class="btn btn-primary" type="submit" name="create_user" value="Add User">
      </div>
    </form>

  </div>
</div>


