<?php include 'db.php';
        $match ='';
        if (isset($_POST['submit_user'])) {
            if ($_POST['password'] == $_POST['con_password']) {
                $date = date('Y-m-d h:i:s');
                $ins_sql = "INSERT INTO users (role, user_fname,user_lname,user_email, user_password , user_gender, user_marital , user_phone , user_designation, user_website , user_address, user_about, user_date) 
				VALUE ('subscriber','$_POST[f_name]' ,'$_POST[l_name]','$_POST[email]','$_POST[password]' , '$_POST[gender]', '$_POST[marital]','$_POST[phone_no]','$_POST[designation]','$_POST[website]','$_POST[address]','$_POST[about]','$date')";

                $run_user = mysqli_query($conn, $ins_sql);
				$match = '<div class="alert alert-success"> Registration complete.</div>';

            } else {
                $match = '<div class="alert alert-danger"> Password is wrong!</div>';
            }
        }


?>
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
                <div class="jumbotron"> <h2>Registration Page</h2></div>
             <?php echo $match; ?>
                <form class="form-horizontal" action="registration.php" method="post" role="form"> 
                    <div class="form-group">					
                        <label for="first_name" class="col-sm-3 control-label">First Name:</label>
                        <div class="col-sm-8">
                            <input class="form-control" type="text" id="f_name" name="f_name" required>
                        </div>
                    </div>
                    <div class="form-group">
                    <label for="last_name" class="col-sm-3 control-label">Last Name:</label>
                        <div class="col-sm-8">
                            <input class="form-control" type="text" id="l_name" name="l_name" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="email" class="col-sm-3 control-label">E-mail Address:</label>
                        <div class="col-sm-8">
                            <input class="form-control" type="text" id="email" name="email" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="password" class="col-sm-3 control-label">Password:</label>
                        <div class="col-sm-8">
                            <input class="form-control" type="password" id="password" name="password" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="con_password" class="col-sm-3 control-label">Confirm Password:</label>
                        <div class="col-sm-8">
                            <input class="form-control" type="password" id="con_password" name="con_password" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="gender" class="col-sm-3 control-label">Gender:</label>
                        <div class="col-sm-3">
                            <select class="form-control" name="gender" id="gender" required>
                                <option value="">Select Gender</option>
                                <option value="Male">Male</option>
                                <option value="Female">Female</option>
                            </select>
                        </div>
                        <label for="marital" class="col-sm-2 control-label">Marital Status:</label>
                        <div class="col-sm-3">
                            <select class="form-control" name="marital" id="marital">
                                <option value="">Select Status</option>
                                <option value="Single">Single</option>
                                <option value="Maried">Maried</option>
                                <option value="Divorced">Divorced</option>
                                <option value="Others">Others</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="phone_no" class="col-sm-3 control-label">Phone No:</label>
                        <div class="col-sm-8">
                            <input class="form-control" type="text" id="phone_no" name="phone_no" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="designation" class="col-sm-3 control-label">Designation:</label>
                        <div class="col-sm-8">
                            <input class="form-control" type="text" id="designation" name="designation">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="website" class="col-sm-3 control-label"> Offical Website:</label>
                        <div class="col-sm-8">
                            <input class="form-control" type="text" id="website" name="website">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="address" class="col-sm-3 control-label">Address:</label>
                        <div class="col-sm-8">
                            <textarea class="form-control" id="address" name="address" rows="4" style="resize: none"></textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="about" class="col-sm-3 control-label">About Me:</label>
                        <div class="col-sm-8">
                            <textarea class="form-control" id="address" name="about" rows="4" style="resize: none" required></textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label"></label>
                        <div class="col-sm-8">
                            <input class="btn btn-block btn-success" value="Register Yourself" type="submit" id="submit_user " name="submit_user">
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