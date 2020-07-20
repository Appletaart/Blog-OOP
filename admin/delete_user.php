<?php include("includes/header.php");

if(!$session->is_signed_in()){
    redirect_to("login.php");}

    if(empty($_GET['id'])){
    redirect_to("users.php");
}else{
    $user = User::find_by_id($_GET['id']);
    $user->delete_id();
    redirect_to("users.php");}

?>

<?php include("includes/sidebar.php");?>

<?php include("includes/content-top.php");?>

<h1>Welkom op de delete user pagina</h1>



<?php include("includes/footer.php");?>

