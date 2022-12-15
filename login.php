<?php include "include/db.php"; ?>
<?php include "include/login_asset.php"; ?>
<?php session_start(); ?>

<?php

// if(isset($_POST['login'])){
//     $login_username=$_POST['username'];
//     $login_password=$_POST['password'];

//     // encrypt password
//     //$login_password=crypt($login_password, '$2a$07$hashsomesillypasswordforsafety$');

//     // To prevent sql injection
//     $login_username=mysqli_real_escape_string($connection,$login_username);
//     $login_password=mysqli_real_escape_string($connection,$login_password);

//     $query="SELECT * FROM users WHERE username='$login_username' ";
//     $user_select=mysqli_query($connection,$query);

//     if(!$user_select){
//         die("Query Failed".mysqli_error($connection));
//         header("Location:index.php");
//     }



//     While($row=mysqli_fetch_array($user_select)){
//         $user_id=$row['user_id'];
//         $username=$row['username'];
//         $email=$row['email'];
//         $password=$row['password'];
//         $user_image=$row['user_image'];
//         $role=$row['role'];

//         if(!$user_id){
//             die("Query Failed".mysqli_error($connection));
//             header("Location:index.php");
//         }
//     } 

if($login_username == $username && $login_password== $password && $role=='admin' && $username!=NULL ){

      $query1="SELECT * FROM college WHERE college_id=1";
      $select_college=mysqli_query($connection,$query1);
      $row1=mysqli_fetch_assoc($select_college);
      $college_id=$row1['college_id'];

        $_SESSION['user_id']=$user_id;
        $_SESSION['username']=$username;
        $_SESSION['email']=$email;
        $_SESSION['password']=$password;
        $_SESSION['user_image']=$user_image;
        $_SESSION['role']=$role;
        $_SESSION['college_id']=$college_id;
        // echo $username;
        // echo "<br>";
        // echo $user_id;
        // echo "<br>";
        // echo $email;
        // echo "<br>";
        // echo $password;
        // echo "<br>";
        // echo $user_image;
        // echo "<br>";
        // echo $role;
        // echo "<br>";
        // echo $college_id;
        // echo "<br>";
        header("Location:admin");

}

else if($login_username == $username && $login_password== $password && $role=='user' && $username!=NULL)
{
   
   header("Location:user.php");

}
else{
    header("Location:index.php");
}




?>