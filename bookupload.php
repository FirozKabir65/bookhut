<?php
    // session_start();
    require_once ('class/book.php');
    require_once ('class/login.php');
    require_once ('class/user.php');
    $userProfile = new UserProfile();
    $img = $userProfile->user_image();
    $book = new Book();
    $bookCategory = $book->book_category_info();
    $bookInfo = "";

    if(isset($_POST['btn'])){
        $bookInfo = $book->save_book_info($_POST);
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
                        <h3 class="text-center text-success"><?php echo $bookInfo ;?></h3>
                        <input type="hidden" class="form-control" name="userId" value="<?php echo $_SESSION['userId'];?>">
                        <div class="form-group">
                            <label class="col-sm-3 control-label">Select Book:</label>
                            <div class="col-sm-9">

                                <input type="file" name="bookPath" multiple accept="application/pdf">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">Book Name:</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="bookName">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">Book Category:</label>
                            <div class="col-sm-9">
                                <select class="form-control" name="bookCategoryId">
                                    <option>---Select Book Category---</option>
                                    <?php while($result=mysqli_fetch_assoc($bookCategory)){;?>
                                    <option value="<?php echo $result['id'];?>"><?php echo $result['categoryName'];?></option>
                                    <?php } ;?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">Author Name:</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="bookAuthor">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">Book Description:</label>
                            <div class="col-sm-9">
                                <textarea name="bookDescription" class="form-control" rows="4"></textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">Select Book Image:</label>
                            <div class="col-sm-9">
                                <input type="file" name="bookImage" multiple accept="image/*">
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

    <!---footer---->
    
    <!--Footer start-->
    <?php include('includes/footer.php');?>
    <!--Footer end-->  
</body>

</html>