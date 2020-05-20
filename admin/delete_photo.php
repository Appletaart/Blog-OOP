<?php include("includes/header.php");
if(!$session->is_signed_in()){
    redirect_to("login.php");}

if(empty($_GET['id'])){
    redirect_to("photos.php");
}else{
    $photo = Photo::find_by_id($_GET['id']);
    $photo->delete_photo();
    redirect_to("photos.php");}

?>

<?php include("includes/sidebar.php");?>

<?php include("includes/content-top.php");?>

<h1>Welkom op de delete foto pagina</h1>

<?php include("includes/footer.php");?>
   
