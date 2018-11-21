<?php session_start();
include  '../db.php';

if (isset($_SESSION['user_name']) && isset($_SESSION['password']) == true){
    $sel_sql = "SELECT * FROM users WHERE user_email = '$_SESSION[user_name]' AND user_password = '$_SESSION[password]' ";
    if($run_sql= mysqli_query($conn,$sel_sql)){
        while ($row = mysqli_fetch_assoc($run_sql)){
            $user_fname = $row['user_fname'];
            $user_lname = $row['user_lname'];
            $user_gender = $row['user_gender'];
            $user_marital = $row['user_marital'];
            $user_phone = $row['user_phone'];
            $user_designation = $row['user_designation'];
            $user_website = $row['user_website'];
            $user_address = $row['user_address'];
            $user_about = $row['user_about'];

            if (mysqli_num_rows($run_sql) == 1){
            if($row['role'] == 'admin'){

            }else{
                header('Location: index.php');
            }
        }else{
            header('Location: ../index.php');
         }
        }
    }
}else{
    header('Location: ../index.php');
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Admin Panel</title>
    <link rel="stylesheet" href="../../bootstrap/css/bootstrap.css">
    <script src="../../js/jquery.js"></script>
    <script src="../../bootstrap/js/bootstrap.js"></script>
</head>
<body>
        <?php include 'header.php';?>
        <div style="width:50px; height: 50px;"></div>
        <?php include 'left-navbar.php';?>
<div class="col-lg-10">
        <div style="width:50px; height: 50px;"></div>

    <div class="col-lg-12">
            <div class="panel panel-primary">
                <div class="panel-heading">
                <div class="col-md-2">
                    <img src="../images/adminimages/image1.jpg" width="100%" class="img-thumbnail">
                </div>
                <div class="col-md-7">
                   <h3><u><?php echo $user_fname.' '.$user_lname ?> </u></h3>
                    <p> <?php echo $user_designation; ?></p>
                    <p> <?php echo $user_address; ?></p>
                    <p> <?php echo $user_phone; ?></p>
                    <p> <?php echo $_SESSION['user_name']  ; ?> </p>
                </div>
                <div class="clearfix"></div>
                </div>
            </div>
    </div>
    <div class="col-md-3">
        <div class="panel panel-default">
            <div class="panel-heading">
                <table class="table table-condensed">
                    <tbody>
                        <tr>
                            <th>Gender</th>
                            <td><?php echo $user_gender; ?></td>
                        </tr>
                        <tr>
                            <th>M. Status</th>
                            <td><?php echo $user_marital; ?></td>
                        </tr>
                        <tr>
                            <th>Website</th>
                            <td><?php echo $user_website; ?></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div class="col-md-3">
    <div class="panel panel-default">
        <div class="panel-heading">
            <table class="table table-condensed">
                <tbody>
                <tr>
                    <td width="10%"> 1</td>
                    <td><a href="#"> The First Post</a> </td>
                </tr>
                <tr>
                    <td width="10%"> 2</td>
                    <td><a href="#"> The Second Post</a> </td>
                </tr>
                <tr>
                    <td width="10%"> 3</td>
                    <td><a href="#"> The Third Post</a> </td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>

    <div class="col-md-6">
        <div class="panel-default panel">
            <div class="panel-heading">
                <h4>About Me</h4>
                <p><?php echo $user_about; ?></p>
            </div>
        </div>
    </div>


</div>
<footer></footer>

</body>

</html>