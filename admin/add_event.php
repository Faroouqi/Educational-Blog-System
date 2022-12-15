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
        <strong id="NITCADMIN" class="text-capitalize"><?php echo $_SESSION['username']; ?></strong>
        </h1>



<!-- PHP CODE -->
<?php
if(isset($_POST['create_event'])){

    $event_title=$_POST['event_title'];
    $organizer_id=$_POST['organizer_id'];
    $college_id=$_SESSION['college_id'];
    $event_date=$_POST['date'];
    $event_date=(date("Y-m-d",strtotime("$event_date")));



    $query="INSERT INTO events(event_title,organizer_id,college_id,`event_date`) VALUES ('$event_title',$organizer_id,$college_id,'$event_date')";
    $add_event=mysqli_query($connection,$query);


    if(!$add_event){
        die("Failed".mysqli_error($connection));
    }

}

?>


<form action="" method="post" enctype="multipart/form-data">

<div class="form-group">
    <label for="title">Event Name</label>
    <input type="text" class="form-control" name="event_title">
</div>

<div class="form-group">
    <label for="post_category">Organizing Club</label><br>
    <select name="organizer_id">

    <?php

     $query1="SELECT * FROM clubs";
     $select_club=mysqli_query($connection,$query1);
     while($row=mysqli_fetch_assoc($select_club)){
        $club_id=$row['club_id'];
        $club_name=$row['club_name'];
        echo "<option value='{$club_id}'>$club_name</option>";
     }
    ?>


    </select>
</div>

<div class="form-group">
    <label for="title">Event Date</label><br>
    <input type="date" id="time" name="date">
</div>

<div class="form-group">
    <input class="btn btn-primary" type="submit" name="create_event" value="Add Event">
</div>

</form>



        </div></div></div></div>
        <div class="col-xs-6">
        <?php include "includes/admin_footer.php" ?>
