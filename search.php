
<?php include 'db.php'; ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8" />
    <title> CMS System</title>
    <script src="../bootstrap/js/bootstrap.js"></script>
    <script src="../js/jquery.js"></script>
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.css">
</head>
<body>
<?php include 'header.php'; ?>
<div class="container">
    <article class="row">
        <section class="col-lg-8">
            <?php
            if (isset($_GET['search_submit'])){
                echo '
                    <div class="panel panel-default"> 
                        <div class="panel-body">
                            <h4> Yours Searched for "'.$_GET['search'].'"</h4>
                        </div>
                    </div>';
                $server = "SELECT * FROM posts WHERE title LIKE '%$_GET[search]%' OR description LIKE '%$_GET[search]%'";
                $run_sql = mysqli_query($conn,$server);
                while ($row = mysqli_fetch_assoc($run_sql)){
                    echo '
                    <div class="panel panel-info">
                        <div class="panel-heading">
                            <h3><a href="post.php?post_id='.$row['id'].'"> '.$row['title'].'</a></h3>
                        </div>
                        <div class="panel-body">
                            <div class="col-lg-4">
                                <img src="'.$row['image'].'" width="100%">
                            </div>
                            <div class="col-lg-8">
                                <p>'.substr($row['description'],0,350).'...</p></div>
                            <a href="post.php?post_id='.$row['id'].'" class="btn btn-primary pull-right btn-sm">Read More</a>
                        </div> 
                  </div>'; }
            } ?>
        </section>
        <?php include 'sidebar.php'; ?>
    </article>
</div>
<div style="height: 50px;width: 50px;"></div>
<?php include 'footer.php'; ?>
</body>
</html>