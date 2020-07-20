<?php include("includes/header.php");

if(!$session->is_signed_in()){
    redirect_to("login.php");
}

$comments = Comment::find_all();

?>

<?php include("includes/sidebar.php");?>

<?php include("includes/content-top.php");?>

<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <h2>COMMENTS</h2>
            
            <table class="table table-header">
                <thead>
                <tr>
                    <th>Id</th>
                    <th>Photo</th>
                    <th>Photo No</th>
                    <th>Author</th>
                    <th>body</th>
                    <th>Delete?</th>
                    <th>Add comment</th>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($comments as $comment): ?>
                    <tr>
                        <td><?php echo $comment->id; ?></td>
                        <td><img src="<?php $photo = Photo::find_by_id($comment->photo_id); echo $photo->picture_path(); ?>" height="62" width="62" alt="" ></td>
                        <td><?php echo $comment->photo_id; ?></td>
                        <td><?php echo $comment->author; ?></td>
                        <td><?php echo $comment->body; ?></td>
                        <td><a href="delete_comment.php?id=<?php echo $comment->id; ?>"
                               class="btn btn-danger rounded-0"><i class="fas fa-trash-alt"></i></a></td>
                        <td><a href="../frontp_photo.php?id=<?php echo $photo->id; ?>"
                               class="btn btn-danger rounded-0"><i class="fas fa-comments"></a></td>
                    </tr>
                    <!--to end foreach that has open with ":" foreach ($photos as $photo):-->
                <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<?php include("includes/footer.php");?>

