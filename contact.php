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
                <div class="jumbotron"> <h2>Contact Page</h2></div>
                <form class="form-horizontal" action="contact.php" method="post" role="form">
                    <div class="form-group">
                        <label for="name" class="col-sm-2 control-label">Name:</label>
                        <div class="col-sm-8">
                            <input class="form-control" type="text" id="name">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="email" class="col-sm-2 control-label">E-mail Address:</label>
                        <div class="col-sm-8">
                            <input class="form-control" type="text" id="email">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="subject" class="col-sm-2 control-label">Subject:</label>
                        <div class="col-sm-8">
                            <input class="form-control" type="text" id="subject">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="comments" class="col-sm-2 control-label">Comments:</label>
                        <div class="col-sm-8">
                            <textarea class="form-control" id="comments" name="comments" rows="8" style="resize: none"></textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label"></label>
                        <div class="col-sm-8">
                            <input class="btn btn-block btn-success" value="Submit Your Form" type="submit" id="submit" name="submit">
                        </div>
                    </div>
                </form>

            </section>
            <?php include 'sidebar.php'; ?>
        </article>
    </div>
    <div style="height: 50px;width: 50px;"></div>
    <?php include 'footer.php'; ?>
</body>
</html>