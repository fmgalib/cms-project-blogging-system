<form action="" method="post">
                        
                 
    <?php  

        if (isset($_GET['edit'])) {
            $edit_cat_id = $_GET['edit'];
        

        $query = "SELECT * FROM categories WHERE cat_id = '$edit_cat_id' ";
        $select_categories_id = mysqli_query($connection, $query);


        while ($row = mysqli_fetch_assoc($select_categories_id)) {

        $cat_id = $row['cat_id'];
        $cat_title = $row['cat_title'];

     ?>
        <div class="form-group">
            <label for="cat_title">Edit Category</label>
            <input class="form-control" 
            value="<?php if(isset($cat_title)){echo $cat_title;} ?>" type="text" name="cat_title">
        </div>

        <div class="form-group">
            <input class="btn btn-primary" type="submit" name="update" value="Update">
        </div>

    <?php  }}  ?>

    <?php
    // Update query

        if (isset($_POST['update'])) {
            $update_cat_title = $_POST['cat_title'];

            $query = "UPDATE categories SET cat_title = '$update_cat_title' WHERE cat_id = '$cat_id' ";
            $update_query = mysqli_query($connection, $query);

            if (!$update_query) {
                die("Query Failed" . mysql_error($connection));
            }

            header("Location: categories.php");
        }


    ?>

</form>