<?php include("includes/header.php");

if (!$session->is_signed_in()) {
    redirect_to("login.php");
}
if (empty($_GET['id'])) {
    redirect_to("comments.php");
}
$comment = Comment::find_by_id($_GET['id']);
if ($comment) {
    $comment->delete_id();
    redirect_to("comments.php");
} else {
    redirect_to("comments.php");
}
?>
<?php include("includes/sidebar.php"); ?>

<?php include("includes/content-top.php"); ?>

    <h1>Welkom op de delete comment pagina</h1>


<?php include("includes/footer.php"); ?>