<?php include("includes/header.php");

if(!$session->is_signed_in()){
    redirect_to("login.php"); }

$aantalUsers = User::find_all();
$aantalComments = Comment::find_all();
$aantalPhotos = Photo::find_all();

?>

<?php include("includes/sidebar.php");?>

<?php include("includes/content-top.php");?>

<?php include("includes/content.php");?>

<?php include("includes/footer.php");?>
   
