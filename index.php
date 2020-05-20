<?php include("includes/hearder.php");

$page =!empty($_GET['page'])? (int)$_GET['page'] : 1;
$items_per_page = 2;
$items_total_count = Photo::count_all();

$paginate = new Paginate($page, $items_per_page, $items_total_count);
$sql = "SELECT * FROM photo ";
$sql .= "LIMIT {$items_per_page} ";
$sql .= "OFFSET {$paginate->offset()}";
?>

 <!-- Page Content -->
 <div class="container-fluid">
 <div class="container">
  <h2 class="my-5">My galleries</h2>

  <!-- Post Content Column -->


   <div class="row">
    <div class="col-12 d-flex flex-wrap">

    <?php $photos = Photo::find_this_query($sql); ?>
    <?php foreach ($photos as $photo): ?>

     <div class="col-6">
      <br>
      <a href="frontp_photo.php?id=<?php echo $photo->id; ?>">
      <img class="img-thumbnail rounded-sm" alt="" src="<?php echo 'admin' . DS . $photo->picture_path(); ?>" width="400"></a>
     </div>

    <?php endforeach; ?>
    </div>

  </div>
  <!--pagination-->
  <div class="row">
   <div class="col-3 mx-auto">
     <ul class="pagination">
      <?php
         if ($paginate->page_total()>1){

          if($paginate->has_previous()){

           echo '<li class="previous"><a class="page-link" href="index.php?page='.$paginate->previous().'">Previous</a></li>';

          }
          for ($i = 1; $i <= $paginate->page_total(); $i++){
            if ($i == $paginate->current_page){

             echo '<li class="active"><a class="page-link" href="index.php?page='. $i .'"> '. $i .' </a></li>';

            }else{

             echo '<li><a class="page-link" href="index.php?page='. $i .'"> ' . $i .' </a></li>';
            }

          }
          if ($paginate->has_next()){

           echo '<li class="next"><a class="page-link" href="index.php?page='.$paginate->next().'">Next</a></li>';

          }
         }
      ?>
     </ul>
   </div>
  </div>

 </div>
 <!-- /.container -->
</div>
<?php include("includes/footer.php");?>