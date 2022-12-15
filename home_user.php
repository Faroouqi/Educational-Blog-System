<?php include "include/db.php"; ?>
<?php include "include/header.php"; ?>

<!-- Navigation -->
<?php include "include/user_navigation.php"; ?>
<?php include "include/carousel.php"; ?> -->
    <!-- Page Content -->
    <div class="container">

        <div class="row">



            <!-- Blog Entries Column -->
            <div class="col-md-8 border border-warning p-4 mt-4 mb-5">

            <?php
            $query="SELECT * FROM posts ORDER BY post_id DESC";
            $select_all_posts_query=mysqli_query($connection,$query);

            while($row=mysqli_fetch_assoc($select_all_posts_query)){
                $post_id=$row['post_id'];
                $post_title=$row['post_title'];
                $post_author=$row['post_author'];
                $post_date=$row['post_date'];
                $post_image=$row['post_image'];
                $post_content=$row['post_content'];

                ?>
            <h1 class="page-header text-uppercase">
            <?php echo $post_title ?>
            </h1>
            <hr class="mb-0">

            <!-- First Blog Post -->
            <p class="lead mb-0 mt-0 text-capitalize"">
                by <a href="index.php"><?php echo $post_author ?></a>
            </p>
            <p>⏰ Last updated: <?php echo $post_date; ?></p>
            <img class="img-responsive" src="admin/images/<?php echo $post_image; ?>" alt="" style="max-width:100%; max-height:400px;">
            <hr>
            <p style=" overflow-wrap: break-word;"><?php echo substr($post_content,0,200); ?></p>
            <a class="btn btn-warning" style="font-weight:bold" href="post_read_more.php?post_id=<?php echo $post_id; ?>">🔖 Read More</a>

            <hr style=" border: 3px dashed orange; border-radius: 5px;width:100%;" class="mb-5 mt-5">
         <?php } ?>
         </div>



<!-- Blog Sidebar Widgets Column -->
            <?php include "include/sidebar.php"; ?>

        </div>
        <!-- /.row -->

        <hr class="mb-0" style="border: 1px dotted brown; border-radius: 5px;width:100%;">

        <?php
        include "include/footer.php";
        ?>