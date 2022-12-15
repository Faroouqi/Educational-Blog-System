<?php include "includes/admin_header.php" ?>
    <div id="wrapper">
    <?php include "includes/admin_navigation.php" ?>
    <div id="page-wrapper">
<div class="container-fluid">
<!-- Page Heading -->
<div class="row">
<div class="col-lg-12">
        <h1 class="page-header">
        Welcome to admin
        <small class="text-capitalize"><?php echo $_SESSION['username']; ?></small>
        </h1>




<!-- PHP CODE -->
<?php
if(isset($_POST['new_user'])){

    $username=$_POST['username'];
    $email=$_POST['email'];
    $password=$_POST['password'];
    $role=$_POST['role'];
    $college_id=$_POST['college'];

    $user_image=$_FILES['user_image']['name'];
    $user_image_temp=$_FILES['user_image']['tmp_name'];


    // Password encryption
    $password=crypt($password, '$2a$07$hashsomesillypasswordforsafety$');



    move_uploaded_file($user_image_temp,"images/$user_image");

    $query="INSERT INTO users(college_id,username,email,password,user_image,role) VALUES ($college_id,'{$username}','{$email}','{$password}','{$user_image}','{$role}')";
    $add_user=mysqli_query($connection,$query);


    if(!$add_user){
        die("Failed".mysqli_error($connection));
    }

}


?>



<form action="" method="post" enctype="multipart/form-data">

<div class="form-group">
    <label for="username">Username</label>
    <input type="text" class="form-control" name="username">
</div>



<div class="form-group">
    <label for="password">Password</label>
    <input type="password" class="form-control" name="password">
</div>

<div class="form-group">
    <label for="email">User Email</label>
    <input type="email" class="form-control" name="email">
</div>


<div class="form-group">
    <label for="post_category">College </label><br>
    <select name="college">

    <?php

     $query1="SELECT * FROM college";
     $select_college=mysqli_query($connection,$query1);

     while($row=mysqli_fetch_assoc($select_college)){
        $college_id=$row['college_id'];
        $college_name=$row['college_name'];
        echo "<option value='{$college_id}'>$college_name</option>";
     }
    ?>


    </select>
</div>




<div class="form-group">
    <label for="image">User Image</label>
    <input type="file" name="user_image">
</div>


<div class="form-group">
    <label for="post_category">User Role</label><br>
    <select name="role">
    <option value="admin">Admin</option>;
    <option value="viewer">Viewer</option>;



    </select>
</div>






<div class="form-group">
    <input class="btn btn-primary" type="submit" name="new_user" value="Add User">
</div>

</form>



        </div></div></div></div>
        <div class="col-xs-6">
        <?php include "includes/admin_footer.php" ?>
