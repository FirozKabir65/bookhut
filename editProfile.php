<?php
    session_start();
    $userId = $_SESSION['userId'];
    require_once 'class/user.php';
    $userProfile = new UserProfile();
    $img = $userProfile->user_image();

    if(isset($_POST['btn'])){
        $profile = $userProfile->store_user_profile($_POST);
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
    
    <!--Footer start-->
    <?php include('includes/footer.php');?>
    <!--Footer end-->
</body>

</html>