<?php 
    include('include/header.php');
    $showallteachers_sql = "SELECT * FROM `users` JOIN `cities` ON users.city_id = cities.id";

    $rows = mysqli_query($conn,$showallteachers_sql);
   
?>
<main id="main" class="main">

<div class="pagetitle">
  <h1>Teachers</h1>
  <nav>
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="index.php">Home</a></li>
      <li class="breadcrumb-item">Teachers</li>
    </ol>
  </nav>
</div><!-- End Page Title -->

<section class="section">
  <div class="row">
    <div class="col-lg-12">

      <div class="card">
        <div class="card-body">
          <h5 class="card-title">List of All Teachers</h5>          

          <!-- Table with stripped rows -->
          <table class="table datatable">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Teacher ID</th>
                <th scope="col">Teacher Name</th>
                <th scope="col">Age</th>
                <th scope="col">Email</th>
                <th scope="col">City</th>
              </tr>
            </thead>
            <tbody>
              <?php
              $srno = 1;
              foreach($rows as $teacher)
              {
              ?>
              <tr>
                <th scope="row"><?php echo $srno; ?></th>
                <td><?php echo $teacher['id'] ?></td>
                <td><?php echo $teacher['name'] ?></td>
                <td><?php echo $teacher['age'] ?></td>
                <td><?php echo $teacher['email'] ?></td>
                <td><?php echo $teacher['city_name'] ?></td>
              </tr>
              <?php
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