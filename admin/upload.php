<?php include("includes/header.php"); ?>

<?php include("includes/sidebar.php"); ?>

<?php include("includes/content-top.php"); ?>

<?php

    if(!$session->is_signed_in()) {
    redirect_to("login.php");
    }

    if(isset($_POST['submit']))
    {
    $photo = new Photo(); // var photo to the class photo
    $photo->title = $_POST['title']; // input form title
    $photo->caption = $_POST['caption'];
    $photo->alternate_text = $_POST['alternate_text'];
    $photo->description = $_POST['description'];
    $photo->set_file($_FILES['file']);

    if($photo->save()) {
        //var_dump($photo);
        echo $message = "Photo uploaded successfully";
        
    }else {

        echo $message = join("<br>", $photo->errors);
    }
    }
?>

<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <h1 class="page-header">UPLOAD</h1>
            <p><?php echo $message = ""; ?></p>
            <form action="upload.php" method="post" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="title">title</label>
                    <input type="text" name="title" class="form-control">
                    <input type="datetime" name="upload_on" value="" hidden >
                </div>
                <div class="form-group">
                    <label for="caption">Caption</label>
                    <input type="text" name="caption" class="form-control">
                </div>
                <div class="form-group">
                    <label for="alternate_text">Alternate text</label>
                    <input type="text" name="alternate_text" class="form-control">
                </div>
                <div class="form-group">
                    <label for="description">Description</label>
                    <textarea id="" name="description" class="form-control" cols="30" rows="10"></textarea>
                </div>
                <div class="form-group">
                    <input type="file" name="file" class="form-control">
                </div>
                <input type="submit" name="submit" value="submit" class="btn btn-primary">
            </form>
        </div>
    </div>
</div>

<?php include("includes/footer.php"); ?>

 