<?php include('partials/menu.php'); ?>

             <div class = "main-content">
                <div class = "wrapper">
                  <h1>Add Admin</h1>

                  <br><br>

                  <?php
                      if(isset($_SESSION['add'])) //Checking whether the session is set or not
                      {
                        echo $_SESSION['add']; //Display the session message if set
                        unset($_SESSION['add']); //Remove Session Mesage
                      }

                 ?>

                  <form action ="" method = "POST">
                      
                       <table class = "tbl-30">
                             <tr>
                                <td>Full-Name: </td>
                                <td>
                                    <input type = "text" name = "full_name" Placeholder = "Enter Your Name">
                                </td>
                             </tr>
                             <tr>
                                <td>Username: </td>
                                <td>
                                    <input type = "text" name = "username" Placeholder = "Your username">
                                </td>
                             </tr>
                             <tr>
                                <td>Password: </td>
                                <td>
                                    <input type = "password" name = "password" Placeholder = "Your password">
                                </td>
                             </tr>
                             <tr>
                                <td colspan ="2">
                                    <input type = "submit" name = "submit" Value = "Add Admin" class = "btn-secondary">
                                </td>
                             </tr>
                       </table>

                  </form>
    </div>
</div>

<?php include('partials/footer.php'); ?> 


<?php 
//process the value in form and save it in database

//check wether the submit button is clicked or not

if (isset($_POST['submit']))

{
    // botton clicked
    echo "Button Clicked";
    //1. Get the data from form
    $full_name = $_POST['full_name'];
    $username = $_POST['username'];
    $password = md5($_POST['password']); //password encryption with MD5

    //2. SQL Query to save data into database
    $sql = "INSERT INTO tbl_admin SET
    full_name='$full_name',
    username = '$username',
    password = '$password' 
    "; 

    //3. Executing Query and Saving Data into Database
    $res = mysqli_query($conn, $sql) or die(mysqli_error());

    //4. Check whether the data (Query is Executed) is inserted or not and display appropriate message
    if($res==TRUE)
    {
       // Data Inserted
       //echo 'Data Inserted';
       //Create a Session Variable to Display Message
       $_Session['add'] = 'Admin Added Successfully';
       //Redirect Page To Manage Admin
       header("location:".SITEURL.'admin/manage-admin.php');
    }
     else
    {
       // Failed to Insert Data
       //echo 'Failed to insert Data';
       //Create a Session Variable to Display Message
       $_Session['add'] = 'Failed To Add Admin';
       //Redirect Page To Add Admin
       header("location:".SITEURL.'admin/add-admin.php');
    }
}

?>