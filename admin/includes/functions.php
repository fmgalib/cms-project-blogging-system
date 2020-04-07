

<!-- Users Online -->
<?php  

function users_online(){
global $connection;

    $session = session_id();
    $time = time();
    $time_out_in_seconds = 60;
    $time_out = $time - $time_out_in_seconds;

    $query = "SELECT * FROM users_online WHERE session = '$session'";
    $result = mysqli_query($connection,$query);
    $count = mysqli_num_rows($result);

    if ($count == NULL) {
         
         mysqli_query($connection, "INSERT INTO users_online(session,time) VALUES('$session','$time') "); 
     } else{

         mysqli_query($connection, "UPDATE users_online SET time = '$time' WHERE session = '$session'"); 
     }

     $users_online_query = mysqli_query($connection, "SELECT * FROM users_online WHERE time > '$time_out'");
     return $count_user = mysqli_num_rows($users_online_query);

 }
?>




<?php

function confirm_query($result){
    global $connection;
    if (!$result) {
        die("Query Failed" . mysqli_error($connection));
      }
}



function insert_categories() {

global $connection;

    if (isset($_POST['submit'])) {
            
        $cat_title = $_POST['cat_title'];

        if ($cat_title == "" || empty($cat_title)) {
            
            echo "This field should not be empty";
        }else{

            $query = "INSERT INTO categories (cat_title) VALUES ('$cat_title')";
            $create_category_query = mysqli_query($connection, $query);

            if (!$create_category_query) {
                die("Query failed" . mysqli_error($connection));
            }

        }

    }

}


function find_all_categories() {
global $connection;


    $query = "SELECT * FROM categories";
    $categories_table = mysqli_query($connection, $query);

    while ($row = mysqli_fetch_assoc($categories_table)) {

        $cat_id = $row['cat_id'];
        $cat_title = $row['cat_title'];

        echo "<tr>";
        echo "<td >{$cat_id}</td>";
        echo "<td >{$cat_title}</td>";
        echo "<td ><a href= 'categories.php?edit={$cat_id}'>Edit</td>";
        echo "<td ><a href= 'categories.php?delete={$cat_id}'>Delete</td>";
        echo "</tr>";
    }

}


function delete_categories() {
global $connection;

    if (isset($_GET['delete'])) {
        $delete_cat_id = $_GET['delete'];

        $query = "DELETE FROM categories WHERE cat_id = '$delete_cat_id' ";
        $delete_query = mysqli_query($connection, $query);

        header("Location: categories.php");
    }

}


?>