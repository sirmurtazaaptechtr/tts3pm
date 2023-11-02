<?php
    $message = '';
    include('include/header.php');
    $showallstudents_sql = "SELECT *, users.id as userid FROM `users` LEFT JOIN `cities` ON users.city_id = cities.id";
    $students = mysqli_query($conn,$showallstudents_sql);

    if($_SERVER["REQUEST_METHOD"] == "GET") {
      if(isset($_GET['userid']) && $_GET['action'] == 'delete') {
        $userid = $_GET['userid'];
        $deletestudent_sql = "DELETE FROM `users` WHERE id = $userid";
        $idDeleted = mysqli_query($conn,$deletestudent_sql);
        if($idDeleted) {          
          header('Location: students.php');
          exit;
        }       
      }
    }
   
?>
<main id="main" class="main">

<div class="pagetitle">  
  <h1>All Students</h1>
  <nav>
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="index.php">Home</a></li>
      <li class="breadcrumb-item">Students</li>
    </ol>
  </nav>
</div><!-- End Page Title -->

<section class="section">
  <div class="row">
    <div class="col-lg-12">

      <div class="card">
        <div class="card-body">
          <h5 class="card-title">List of All Students</h5>          

          <!-- Table with stripped rows -->
          <table class="table datatable">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Photo</th>
                <th scope="col">Student ID</th>
                <th scope="col">Student Name</th>
                <th scope="col">Age</th>
                <th scope="col">Email</th>
                <th scope="col">City</th>
                <th scope="col">Action</th>
              </tr>
            </thead>
            <tbody>
              <?php
              $srno = 1;
              foreach($students as $student)
              {
              ?>
              <tr>
                <th scope="row"><?php echo $srno; ?></th>
                <td>
                  <img src="<?php echo $student['image']; ?>" alt="<?php echo $student['name'] ?>" class="img-fluid img-thumbnail">
                </td>
                <td><?php echo $student['userid'] ?></td>
                <td><?php echo $student['name'] ?></td>
                <td><?php echo $student['age'] ?></td>
                <td><?php echo $student['email'] ?></td>
                <td><?php echo $student['city_name'] ?></td>
                <td>
                <div class="btn-group" role="group" aria-label="Action Buttons">
                  <a type="button" class="btn btn-warning" href="<?php echo 'editstudent.php?userid='.$student['userid'].'&action=edit'?>">Edit</a>
                  <a type="button" class="btn btn-danger" href="<?php echo '?userid='.$student['userid'].'&action=delete'?>">Delete</a></div>
                </td>
                
              </tr>
              <?php
              $srno++;
              }
              ?>
            </tbody>
          </table>
          <!-- End Table with stripped rows -->

        </div>
      </div>

    </div>
  </div>
</section>

</main><!-- End #main -->
<?php include('include/footer.php');