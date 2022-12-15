<?php include "include/db.php"; ?>
<?php include "include/login_asset.php"; ?>
<?php include "include/header.php"; ?>

<!-- Navigation -->
<?php
// <--!-- Navigation -->
     include "include/navigation.php"; 


?>

    <!-- Page Content -->
    <div class="container mt-5">

        <div class="row mt-5">

<div class="col-md-8 border border-warning p-4 mt-5 pt-5 mb-5">


        <h1 class="text-center"><?php echo $college_shortname; ?> CLUBS</h1>

        <div class="text-center">
        <img class="mx-auto" src="images/<?php echo $college_logo; ?>" style="max-height:50px; max-width:50px">
        </div>
        <hr style=" border: 1px dashed orange; border-radius: 5px;width:100%;" class=" mt-5">

        <div class="d-flex flex-wrap justify-content-center">





    <?php
      $query1="SELECT * FROM college WHERE college_id=1";
      $select_college=mysqli_query($connection,$query1);
      $row1=mysqli_fetch_assoc($select_college);
      $college_id=$row1['college_id'];


            $query="SELECT * FROM clubs WHERE college_id=$college_id ORDER BY club_shortname";
            $select_all_clubs=mysqli_query($connection,$query);

            while($row=mysqli_fetch_assoc($select_all_clubs)){
                $club_id = $row['club_id'];
                $club_shortname=$row['club_shortname'];
                $club_name=$row['club_name'];
                $club_email=$row['club_email'];
                $club_image=$row['club_image'];

                ?>



            <div class="card border border-warning m-2" style="width: 18rem;">
            <h4 class="text-center"><?php echo $club_shortname; ?></h4>
            <img src="images/<?php echo $club_image; ?>" class="card-img-top" alt="club image" style="height:250px" >
            <div class="card-body">
            <h4 class="card-text"><?php echo $club_name; ?></h4>
            <a style="font-weight:bold;" href="mailto:<?php echo $club_email; ?>" class="card-link">MAIL US</a>
            </div>
            </div>



            <?php } ?>



        </div>




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