<?php  

  if (isset($_GET['u_id'])) {
      $edit_user_id = $_GET['u_id'];
    }

    $query = "SELECT * FROM users WHERE user_id = '$edit_user_id' ";
    $select_user_query = mysqli_query($connection, $query);

    while ($row = mysqli_fetch_assoc($select_user_query)) {
        $user_id            = $row['user_id'];
        $user_name          = $row['user_name'];
        $user_fname         = $row['user_fname'];
        $user_lname         = $row['user_lname'];
        $user_email         = $row['user_email'];
        $user_password      = $row['user_password'];
        $user_role          = $row['user_role'];
        $user_image         = $row['user_image'];
        

      }


  if (isset($_POST['update_user'])) {
        $update_user_name       = $_POST['user_name'];
        $update_user_fname      = $_POST['user_fname'];
        $update_user_lname      = $_POST['user_lname'];
        $update_user_email      = $_POST['user_email'];
        $update_user_password   = $_POST['user_password'];
        $update_user_image      = $_FILES['user_image']['name'];
        $update_user_image_temp = $_FILES['user_image']['tmp_name'];
        $update_user_role       = $_POST['user_role'];
        
        move_uploaded_file($update_user_image_temp, "../images/$user_image");


        $query = "SELECT randSalt FROM users";
        $randSalt_query = mysqli_query($connection, $query);
        if (!$randSalt_query) {
            die("Query failed". mysql_error($connection));
        }

        $row = mysqli_fetch_array($randSalt_query);
        $salt = $row['randSalt'];
        $hashed_password = crypt($update_user_password, $salt);


        $query = "UPDATE users SET "; 
        $query .= "user_name        = '$update_user_name', ";
        $query .= "user_fname       = '$update_user_fname', ";
        $query .= "user_lname       = '$update_user_lname', ";
        $query .= "user_email       = '$update_user_email', ";
        $query .= "user_password    = '$hashed_password', ";
        $query .= "user_image       = '$update_user_image', ";
        $query .= "user_role        = '$update_user_role' ";
        $query .= "WHERE user_id    = '$edit_user_id' ";
        
        $update_user_query = mysqli_query($connection, $query);
        confirm_query($update_user_query);

        header("Location: users.php");
        

      }  

?>




<div class="card">
  <div class="card-header">
    <h3>Edit User</h3>
  </div>
  <div class="card-body">
    
    <form action="" method="post" enctype="multipart/form-data">
      <div class="form-group">
        <label for="user_name">User Name</label>
        <input type="text" class="form-control" name="user_name" value="<?php echo $user_name; ?>">
      </div>
      <div class="form-group">
        <label for="user_fname">First Name</label>
        <input type="text" class="form-control" name="user_fname" value="<?php echo $user_fname; ?>">
      </div>
      <div class="form-group">
        <label for="user_lname">Last Name</label>
        <input type="text" class="form-control" name="user_lname" value="<?php echo $user_lname; ?>">
      </div>
      <div class="form-group">
        <label for="user_email">Email</label>
        <input type="text" class="form-control" name="user_email" value="<?php echo $user_email; ?>">
      </div>
      <div class="form-group">
        <label for="user_password">Passsword</label>
        <input type="password" class="form-control" name="user_password" value="<?php echo $user_password; ?>">
      </div>
      <div class="form-group">
        <label for="user_role">User Role</label><br>
        <select name="user_role" id="" >

            <option><?php echo $user_role; ?></option>
            <?php 

            if ($user_role == "Admin") {
              echo "<option>Subscriber</option>";
            }else{
              echo "<option>Admin</option>";
            }

            ?>

        </select>
      </div>
      
      <div class="form-group">
        <label for="user_image">Image</label>
        <input type="file"  name="user_image">
      </div>
      
      <div class="form-group">
        <input class="btn btn-primary" type="submit" name="update_user" value="Update">
      </div>
    </form>

  </div>
</div>


