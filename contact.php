<?php include "include/db.php"; ?>
<?php include "include/login_asset.php"; ?>
<?php include "include/header.php"; ?>

<!-- Navigation -->



<?php

      $query="SELECT * FROM college";
      $select_college=mysqli_query($connection,$query);

      $row=mysqli_fetch_assoc($select_college);

      $college_id=$row['college_id'];
      $college_name=$row['college_name'];
      $college_logo=$row['college_logo'];
      $college_address=$row['college_address'];
      $college_city=$row['college_city'];
      $college_pin=$row['college_pin'];
      $college_phone=$row['college_phone'];
      $college_nirf=$row['college_nirf'];
      $college_arch_nirf=$row['college_arch_nirf'];
      $college_ariia=$row['college_ariia'];
      $college_vision=$row['college_vision'];
      $college_mission=$row['college_mission'];
      $college_director=$row['college_director'];
      $college_about=$row['college_about'];
      $college_shortname=$row['college_shortname'];
      $college_site=$row['college_site'];

?>




<!-- Navigation -->
<?php
// <--!-- Navigation -->

     include "include/navigation.php"; 



?>
    <!-- Page Content -->
    <div class="container mt-5">

        <div class="row mt-5">

<div class="col-md-8 border border-warning p-4 mt-5 pt-5 mb-5">


        <h4 class="text-center"><?php echo $college_name; ?></h4>

        <div class="text-center">
        <img class="mx-auto" src="images/<?php echo $college_logo; ?>" style="max-height:150px; max-width:150px">
        </div>

        <hr style=" border: 1px dashed orange; border-radius: 5px;width:100%;" class=" mt-5">
        <h3 style="color:black">Address</h3>
        <h4 class="text-left" style="color:brown"><?php echo $college_address; ?></h4>
        <h4 class="text-left" style="color:brown"><?php echo $college_city; ?></h4>
        <h4 class="text-left" style="color:brown"><?php echo $college_pin; ?></h4>

        <hr style=" border: 1px dashed orange; border-radius: 5px;width:100%;" class=" mt-5">
        <h3 style="color:black">Phone Number</h3>
        <h4 class="text-left" style="color:brown"><?php echo $college_phone; ?></h4>

        <hr style=" border: 1px dashed orange; border-radius: 5px;width:100%;" class=" mt-5">
        <h3 style="color:black">College PORTAL</h3>
        <h4 class="text-left" style="color:brown"><a href="<?php echo $college_site; ?>" target="_blank"> Click here</a></h4>





</div>










<!-- Blog Sidebar Widgets Column -->
<div class="col-md-4 p-4  mb-5">

<!-- Login-->
<!-- <div class="well border border-warning p-4 mb-4 mt-4" style="background-color:#fbf2e6">
<a href="./admin/">Dashboard</a> -->
       <!-- /.input-group -->
   </div>



   <!-- Side Widget Well -->
   <!-- <?php include "include/widget.php"; ?> -->

</div>



        </div>
        <!-- /.row -->

        <hr class="mb-0" style="border: 1px dotted brown; border-radius: 5px;width:100%;">

        <?php
        include "include/footer.php";
        ?>