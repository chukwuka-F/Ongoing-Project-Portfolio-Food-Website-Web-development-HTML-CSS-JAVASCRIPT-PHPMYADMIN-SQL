<?php include('partials/menu.php'); ?>
                <!--menu section ends-->

                <!--main content section starts-->
                <div class = "main-content">
                <div class = "wrapper">
                <h1>Manage Admin</h1>

                <br /> 

                <?php
                     if(isset($_SESSION['add']))
                     {
                       echo $_SESSION['add']; //Displaying Session Message
                       unset($_SESSION['add']); //Removing Session Message
                     }

                     if(isset($_SESSION['delete']))
                     {
                       echo $_SESSION['delete'];
                       unset($_SESSION['delete']); 
                     }

                ?>
                <br><br><br>

                <!--Botton To Add Admin-->
                <a href="add-admin.php" class="btn-primary">Add Admin</a>

                <br /> <br /> <br />

                <table class = "tbl-full">
                    <tr>                      
                       <th>S.N.</th>
                       <th>Full Name</th>
                       <th>Username</th>
                       <th>Actions</th>
                    </tr>


                    <?php
                         //Query to Get All Admin
                         $sql = "SELECT * FROM tbl_Admin";
                         // Execute the Query
                         $res = mysqli_query($conn, $sql);

                         //Check whether the Query is Executed or Not
                         if($res==TRUE)
                {
                 // Count Rows to check whether we have data in the database or not
                 $count = mysqli_num_rows($res); //function to get all the rows in database

                 $sn=1; // create a variable and asign the value

                 //check the num of rows
                 if($count>0)
                 {
                //We have data in the database
                while($rows=mysqli_fetch_assoc($res))
                  {
                    //using while loop to get all the data from database
                    //And while loop will run as long as we have data in database
                    
                    //Get individual data
                    $id=$rows['ID'];
                    $full_name=$rows['full_name'];
                    $username=$rows['username'];

                    //Display the values in our table
                    ?>

                    <tr>
                        <td><?php echo $sn++; ?>. </td>
                        <td><?php echo $full_name; ?></td>
                        <td><?php echo $username; ?></td>
                        <td>
                            <a href="#" class="btn-secondary">Update Admin</a>
                            <a href="<?php echo SITEURL; ?>admin/delete-admin.php?id=<?php echo $id; ?>" class="btn-danger">Delete Admin</a> 
                        </td>
                    </tr>

                    <?php

                    }
                  }
                else
                  {
                    //We do not have data in the database
                  }
                }
             ?>


                    
        </table>


    </div>
</div>
                    <!--main content section ends-->

<?php include('partials/footer.php'); ?> 