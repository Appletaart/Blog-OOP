<?php include("includes/header.php");

if(!$session->is_signed_in()){
        redirect_to("login.php");}

if(empty($_GET['id'])) {
    redirect_to("users.php");
}

$user = User::find_by_id($_GET['id']);

if (isset($_POST['submit'])) {

    if ($user) {
        $user->username = $_POST['username'];
        $user->first_name = $_POST['first_name'];
        $user->last_name = $_POST['last_name'];
        $user->password = $_POST['password'];
        if(empty($_FILES['file'])) {
            $user->save();
        }else{
            var_dump($user);
            $user->set_file($_FILES['file']);
            $user->save_user_and_image();
            $user->save();
            redirect_to('users.php');

        }
    }
}

?>

<?php include("includes/sidebar.php");?>

<?php include("includes/content-top.php");?>

<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            
            <h2>Welkom op de edit user pagina</h2>

           <form action="" method="post" enctype="multipart/form-data">
               <div class="col-md-8">
               <div class="form-group">
                   <label for="username">User name</label>
                   <input type="text" name="username" class="form-control" value="<?php echo $user->username; ?>">
               </div>
               <div class="form-group">
                   <label for="first_name">First name</label>
                   <input type="text" name="first_name" class="form-control" value="<?php echo $user->first_name; ?>">
               </div>
               <div class="form-group">
                   <label for="last_name">Last name</label>
                   <input type="text" name="last_name" class="form-control" value="<?php echo $user->last_name; ?>">
               </div>
               <div class="form-group">
                   <label for="password">Password</label>
                  <input type="password" name="password" class="form-control" value="<?php echo $user->password; ?>">
               </div>
                   <div class="form-group">
                       <img src="<?php echo $user->image_path_and_placeholder(); ?>" class="img-thumbnail" width="48" height="48">
                       <label for="file">User image</label>
                       <input type="file" name="file" class="form-control" value="">
                   </div>

               </div>
               <input type="submit" name="submit" value="Update User" class="btn btn-primary">
           </form>
        </div>
    </div>
</div>

<?php include("includes/footer.php");?>