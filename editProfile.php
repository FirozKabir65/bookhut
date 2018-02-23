<?php 
    // session_start();
    $id = $_GET['id'];
    require_once ('class/user.php');
    $userProfile = new UserProfile();
    $img = $userProfile->user_image();
    if(isset($id)){
        $profileInfo = $userProfile->show_user_profile($id);
    }

    if(isset($_POST['btn'])){
        $updateUserInfo = $userProfile->update_user_info($_POST);
    }
?>

<!--Header start-->
<?php include('includes/header.php');?>
<!--Header end-->
    <div class="container content-body">
        <div class="row">
            <!-- sidebar start -->
            <?php include('includes/sideBar.php');?>
            <!-- sidebar end -->
            <div class="main-content col-md-offset-1 col-md-8">
                <div class="row bookup-row">
                    <!-- form start -->
                    <form class="form-horizontal" action="" method="post" enctype="multipart/form-data">
                        <h3 class="text-center text-success"></h3>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">First Name:</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="firstName" value="<?php echo $userLoginInfo['firstName']?>">
                                <input type="hidden" class="form-control" name="id" value="<?php echo $id?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">Last Name:</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="lastName" value="<?php echo $userLoginInfo['lastName']?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">Profession:</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="profession" value="<?php echo $profileInfo['profession'];?>">
                            </div>
                        </div>
                    
                        <div class="form-group">
                            <label class="col-sm-3 control-label">Favourite Books:</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="favouriteBooks" value="<?php echo $profileInfo['favouriteBooks']?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">Favourite Writers:</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="favouriteWriters" value="<?php echo $profileInfo['favouriteWriters']?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">Interests:</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="interests" value="<?php echo $profileInfo['interests']?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">Address:</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="address" value="<?php echo $profileInfo['address']?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">Select Profile Image:</label>
                            <div class="col-sm-9">
                                <input type="file" name="profileImage" multiple accept="image/*">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">Previous Profile Image:</label>
                            <div class="col-sm-9">
                                <img src="<?php echo $img ;?>" alt="" height="50px" width="50px">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-offset-3 col-sm-9">
                                <button type="submit" name="btn" class="btn btn-success btn-block"><i class="fas fa-edit"></i> Edit Profile Info</button>
                            </div>
                        </div>
                    </form>

                    <!-- form end -->
                </div>
            </div>
        </div>
    </div>

    <!---footer---->
    
    <?php include('includes/footer.php');?>
</body>

</html>
