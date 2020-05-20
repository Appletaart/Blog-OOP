<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
        <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>
    </div>
    <!-- apple edit -->
    <div class="row">
        <div class="col-12">
  <!--         <h2>Variabele titel</h2>
            <hr>
            <h3>Alle users</h3>

            <?php /*// search by user

                            $username = $_GET['username'];
                              echo $username;
                              $user = User::find_by_user($username);

                              echo $user->id."".$user->username . " " . $user->last_name;


                       for een test van class database
                          if($database->connection){
                              echo "OK connectie gemaakt met de database";
                          }
                              echo "<br>" . "ophalen van 1 user" . "<br>";
                              $sql = "SELECT * FROM user WHERE id = 2";
                              $result = $database->query($sql);
                              $user_found = mysqli_fetch_array($result);
                              echo $user_found["username"];

                      // Manier 1 - find all user in class user -* public function find_all_users() *-

                         $user = new User();
                         $result = $user->find_all_users();
                         while ($row = mysqli_fetch_array($result)){
                         echo $row["username"] . "<br>";
                      }

                       // Manier 2 -find all user - static -* public static function find_all_users() *

                      $result = User::find_all_users();
                      while($row = mysqli_fetch_array($result)) {
                          echo $row["username"] . "<br>";
                      }

                      // to replace with function instantie

                      $users = User::find_all();

                      foreach ($users as $user) {
                          echo $user->username . "<br>";
                      }

                      */?>

            <h3>Zoek user met id</h3>-->

            <?php
            /*
                    $result = User::find_user_by_id(2);
                    echo $result["username"] . "<br>";

                    // explain how to use object array
                    $result = User::find_user_by_id(2);
                    $user = new User();
                    $user->id = $result['id'];
                    $user->username = $result['username'];
                    $user->password = $result['password'];
                    $user->first_name = $result['first_name'];
                    $user->last_name = $result['last_name'];

                    echo $user->username . " " . $user->last_name;

            // above that we wrote we use function instantie to be replace
            $user = User::find_by_id(3);
            //   $user = User::instantie($result);
            echo $user->username . " - " . $user->last_name . " - " . $user->id;   */?>

            <?php
            /*
           //test create user
           $user = new User();
           $user->username = "Sam";
           $user->password = "123";
           $user->first_name = "Sam";
           $user->last_name = "Decursist";

           $user->create();

            // test update user
            $user = User::find_user_by_id(2);
            $user->last_name = "Brugge";

            $user->update();


            // test delete_id function
            $user = User::find_user_by_id(6);

            $user->delete_id();


            // test function save()
            //crete user
            $user = new User();
            $user->username = "kuku";

            $user->save();

            //update user

            $user = User::find_by_id(14);
            //var_dump($user);

            $user->username = "test";
            $user->last_name = "test";
            $user->save();
*/
            /*$user = User::find_by_id(6);
            $user->delete_id();*/
            ?>
            <!--<h3>alle foto's</h3>
            --><?php
/*            $photos = Photo::find_all();
            foreach ($photos as $photo){
                echo $photo->title . "<br>";
            }
            */?>

        </div>
        <!--end apple edit -->
    </div>
    <!-- Content Row -->
    <div class="row">

        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">USERS
                            </div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo User::count_all(); ?></div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-user fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-danger shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">PHOTOS
                            </div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo Photo::count_all(); ?></div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-camera fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Pending Requests Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">COMMENTS
                            </div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo Comment::count_all(); ?></div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-comments fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Pending Requests Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">VIEWS
                            </div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $session->count; ?></div>
                        </div>
                        <div class="col-auto">
                            <i class="far fa-eye fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Content Row -->

    <!--Google Pie chart-->
    <div class="row">
        <div id="piechart_3d" style="width: 900px; height: 500px;"></div>
    </div>


    </div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->