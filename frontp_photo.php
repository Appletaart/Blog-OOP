<?php include("includes/hearder.php");

if(empty($_GET['id'])){
    redirect_to("index.php");
}

$photo = Photo::find_by_id($_GET['id']);

if(isset($_POST['submit'])){
   
    $author = trim($_POST['author']);
    $body = trim($_POST['body']);

    $new_comment = Comment::create_comment($photo->id, $author, $body);

    if($new_comment && $new_comment->save()){
        redirect_to("frontp_photo.php?id={$photo->id}");
    }else{
        $message = "there are some problems saving";
    }
}else{
    $author = "";
    $body = "";
}

$comments = Comment::find_the_comment($photo->id);

?>

<!-- Page Content -->
<div class="container">

    <div class="row">

        <!-- Post Content Column -->
        <div class="col-lg-8">

            <!-- Title -->
            <h3 class="text-dark"><?php echo $photo->title;?></h3>
            <!-- Author -->
            <p class="lead">
                by
                <a class="text-gray-800" href="#">BlogOOP</a>
            </p>

            <hr>

            <!-- Date/Time -->
            <p>Posted on <?php echo $photo->upload_on;?></p>

            <hr>

            <!-- Preview Image -->
            <img class="img-fluid rounded" alt="" src="<?php echo 'admin' . DS . $photo->picture_path(); ?>" width="300" height="300" ><!--src="http://placehold.it/900x300/a3cffb/ffffff"-->
            <hr>
            <!-- Post Content -->
            <p class="lead text-gray-800"><?php echo $photo->description ?></p>
           
           
            <hr>

            <!-- Comments Form -->
            <div class="card my-4">
                <h5 class="card-header">Leave a Comment:</h5>
                <div class="card-body">
                    <form method="POST">
                        <div class="form-group">
                            <label for="author">Author</label>
                            <input type="text" name="author" class="form-control">
                        </div>
                        <div class="form-group">
                            <textarea class="form-control" name="body" rows="3"></textarea>
                        </div>
                        <button type="submit" name="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>

            <?php foreach ($comments as $comment): ?>
            <!-- Single Comment -->
            <div class="media mb-4">
                <img class="d-flex mr-3 rounded-circle" style="width: 50px; height: 50px;" src="https://avatars.dicebear.com/v2/male/:seed.svg" alt="">
                <div class="media-body">
                    <h5 class="mt-0"><?php echo $comment->author;?> on photo <?php echo $comment->photo_id; ?></h5>
                    <p><?php echo $comment->body; ?></p>
                </div>
            </div>
            <?php endforeach; ?>
            <?php ?>

            <!-- Comment with nested comments -->
            <div class="media mb-4">
                <img class="d-flex mr-3 rounded-circle" style="width: 50px; height: 50px;" src="https://avatars.dicebear.com/v2/female/:seed.svg" alt="">
                <div class="media-body">
                    <h5 class="mt-0">Commenter Name</h5>
                    Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin. 

                </div>
            </div>

        </div>

        <!-- Sidebar Widgets Column -->
        <div class="col-md-4">
            <div class="card my-4">
                <h5 class="card-header">Side Widget</h5>
                <div class="card-body">
                    You can put anything you want inside of these side widgets. They are easy to use, and feature the new Bootstrap 4 card containers!
                </div>
                <!-- Side Widget --></div>
        </div>

    </div>
    <!-- /.row -->

</div>
<!-- /.container -->

<?php include("includes/footer.php");?>