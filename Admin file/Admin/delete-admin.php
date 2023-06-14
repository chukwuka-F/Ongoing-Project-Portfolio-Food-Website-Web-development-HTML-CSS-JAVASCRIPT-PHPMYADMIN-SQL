<?php

// include constants.php file here
include('../config/constants.php');

// 1. Get the ID of Admin to be deleted
$id = $_GET['id'];

// 2. create SQL Query to delete Admin
$sql = "DELETE from tbl_admin where id=$id";

// Execute the Query
$res = mysqli_query($conn, $sql);

//check whether the query executed successfully or not
if($res==TRUE)
{
    // Query executed successfully and Admin Deleted
    //echo "Admin Deleted";
    //create session variable to display message
    $_SESSION['delete'] = "<div class = 'success'>Admin Deleted Successfully.</div>";
    //Redirect To Manage admin page
    header('location:'.SITEURL.'admin/manage-admin.php');
}
else
{
    // Failed to Delete Admin
    echo "Failed to Delete Admin";

    $_SESSION['delete'] = "<div class = 'error'>Failed To Delete Admin. Try Again Later.</div>";
    header('location:'.SITEURL.'admin/manage-admin.php');
}

// 3. Redirect to manage admin page with message(success/error)

?>