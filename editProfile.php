<?php
    session_start();
    $userId = $_SESSION['userId'];
    

    require_once 'class/user.php';
    // require_once 'class/login.php';
    $userProfile = new UserProfile();

    if(isset($_POST['btn'])){
        $profile = $userProfile->store_user_profile($_POST);
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <link rel="stylesheet" href="css/animate.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
    
    
    <title>Book Hut :: Share your books here</title>
    
</head>

<body>
    <!---start-wrap---->
    <div class="container top-bar">
        <div class="row">
            <div class="col-md-12 menu">
                <nav class="navbar navbar-inverse navbar-fixed-top header">
                    <div class="container-fluid">
                        <!-- Brand and toggle get grouped for better mobile display -->
                        <div class="navbar-header">
                            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" style="background-color: #4682B4;">
                                <span class="sr-only">Toggle navigation</span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                            </button>
                            <a class="navbar-brand" href="homePage.html"><img src="images/bhlogo.png" alt="BookHut" class="image-responsive"></a>
                        </div>
                        <!-- Collect the nav links, forms, and other content for toggling -->
                        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                            <ul class="nav navbar-nav navbar-right">
                                <li><a href="homePage.html"><i class="fas fa-home" title="Home"></i><span class="sr-only">(current)</span></a></li>
                                <li><a href="category_news.php"><i class="fab fa-facebook-messenger" title="MSG"></i></a></li>
                                <li><a href="#"><i class="fas fa-bell" title="NotiFication"></i></a></li>
                                <li><a href="bookupload.php"><i class="fas fa-cloud-upload-alt" title="BookUp"></i></a></li>
                                <li><a href="#"><i class="fas fa-search" title="Search"></i></a></li>
                                <li><a href="#"><i class="fas fa-sign-out-alt" title="LogOut"></i></a></li>
                            </ul>
                        </div>
                        <!-- /.navbar-collapse -->
                    </div>
                    <!-- /.container-fluid -->
                </nav>
            </div>
        </div>
    </div>
    <div class="container content-body">
        <div class="row">
            <div class="left-sidebar col-md-3">
               <div class="row">
                  <div class="pro_pic">
                    <a href="index.html"><img src="images/templateImages/man.jpg" title="pro_pic"></a>
                    <h3>Bruce Wayne</h3>
                  </div>
               </div>
               <div class="row">
                    <div class="col-md-offset-3 col-md-6 col-md-offset-3 view-profile">
                        <button type="btn" class="btn btn-info">View Profile</button>
                    </div>
                    <div class="col-md-offset-3 col-md-6 col-md-offset-3 edit-profile">
                        <button type="btn" class="btn btn-info">Edit Profile</button>
                    </div>
               </div>
            </div>
            <div class="main-content col-md-offset-1 col-md-8">
                <div class="row bookup-row">
                    <form class="form-horizontal" action="" method="post" enctype="multipart/form-data">
                        <h3 class="text-center text-success"></h3>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">First Name:</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="firstName">
                                <input type="text" class="form-control" name="id" value="<?php echo $userId ;?>" >
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">Last Name:</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="lastName">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">Profession:</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="profession">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">Favourite Books:</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="favouriteBooks">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">Favourite Writers:</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="favouriteWriters">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">Interests:</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="interests">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">Address:</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="address">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">Select Profile Image:</label>
                            <div class="col-sm-9">
                                <input type="file" name="profileImage" multiple accept="image/*">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-offset-3 col-sm-9">
                                <button type="submit" name="btn" class="btn btn-success btn-block"><i class="fas fa-edit"></i> Edit Profile Info</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!---footer---->
    
    <div class="container-fluid">
        <div class="row">
            <div class="footer col-md-12">
                <p class="text-center">&copy; 2018 Book Hut. All Rights Reserved | By LazyWarriors</p>
            </div>
        </div>
    </div>          


    <script defer src="https://use.fontawesome.com/releases/v5.0.6/js/all.js"></script>
    <script src="js/jquerylib.js"></script>
    <script src="js/jquery-3.2.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/wow.min.js"></script>
    <script src="js/custom.js"></script>
    <script src="js/modernizr-custom.js"></script> 
</body>

</html>