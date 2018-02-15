<!DOCTYPE HTML>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="keywords" content="" />
    <link href='//fonts.googleapis.com/css?family=Merriweather+Sans' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <link rel="stylesheet" href="css/animate.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="u.css">

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

                   <!-- <div class="view-profile">
                       
                   </div> -->
               </div>
            </div>
            <div class="main-content col-md-offset-1 col-md-8">
                <div class="row">
                    <form class="form-horizontal" action="" method="post" enctype="multipart/form-data">
                        <div class="form-group">
                            <label class="col-sm-3 control-label">Select Book:</label>
                            <div class="col-sm-9">
                                <input type="file" name="book_image" multiple accept="images/*">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">Book Name:</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="book_name">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">Book Category:</label>
                            <div class="col-sm-9">
                                <select class="form-control" name="book_category">
                                    <option>---Select Book Category---</option>
                                    <option value="1">Published</option>
                                    <option value="0">Unpublished</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">Author Name:</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="author_name">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">Book Description:</label>
                            <div class="col-sm-9">
                                <textarea name="book_description" class="form-control" rows="4"></textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">Select Book Image:</label>
                            <div class="col-sm-9">
                                <input type="file" name="book" multiple accept="pdf/*">
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <div class="col-sm-offset-3 col-sm-9">
                                <button type="submit" name="btn" class="btn btn-success btn-block"><i class="fas fa-cloud-upload-alt"></i> Upload Book</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
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
    <script src="custom.js"></script>
    <script src="js/modernizr-custom.js"></script> 
</body>

</html>