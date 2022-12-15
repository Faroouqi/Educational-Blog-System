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



            <table class="table table-bordered table-hover">
                <thead>
                    <tr class="bg-primary">
                        <th>Id</th>
                        <th>Username</th>
                        <th>Email</th>
                        <th>College</th>
                        <th>Image</th>
                        <th>Role</th>
                        <th>Admin</th>
                        <th>Viewer</th>
                        <th>Delete</th>
                    </tr>
                </thead>

            <tbody>
            <?php
                    $college_id=$_SESSION['college_id'];
                    $query1="SELECT * FROM college WHERE college_id=$college_id";
                    $select_college=mysqli_query($connection,$query1);
                    $row=mysqli_fetch_assoc($select_college);
                    $college_name=$row['college_name'];



        $query="SELECT * FROM users";
        $select_users=mysqli_query($connection,$query);

        while($row=mysqli_fetch_assoc($select_users)){
            $user_id=$row['user_id'];
            $username=$row['username'];
            $email=$row['email'];
            $user_image=$row['user_image'];
            $role=$row['role'];


            echo "<tr>";
                echo "<td>$user_id</td>";
                echo "<td>$username</td>";
                echo "<td>$email</td>";
                echo "<td>$college_name</td>";
                echo "<td><img src='images/$user_image' class='img-circle' style='max-width:120px; height:80px;'></td>";
                echo "<td>$role</td>";

                echo "<td><a href='users.php?admin={$user_id}' style='color:green;'>Admin</a></td>";
                echo "<td><a href='users.php?viewer={$user_id}' style='color:orange;'>Viewer</a></td>";
                echo "<td><a href='users.php?delete={$user_id}' style='color:red;'>Delete</a></td>";
            echo "</tr>";
        }

    ?>
            </tbody>


            </table>

                <?php
                if(isset($_GET['delete'])){
                $delete_id=$_GET['delete'];
                $query="DELETE FROM users WHERE user_id={$delete_id}";
                $delete_result=mysqli_query($connection,$query);
                header("Location: users.php");

                }
                if(isset($_GET['admin'])){
                    $user_id=$_GET['admin'];
                    $query="UPDATE users SET role='admin' WHERE user_id={$user_id}";
                    $admin_result=mysqli_query($connection,$query);
                    header("Location: users.php");
                }
                if(isset($_GET['viewer'])){
                    $user_id=$_GET['viewer'];
                    $query="UPDATE users SET role='viewer' WHERE user_id={$user_id}";
                    $viewer_result=mysqli_query($connection,$query);
                    header("Location: users.php");
                }




                ?>


    <div class="col-xs-6">
    <?php include "includes/admin_footer.php" ?>
