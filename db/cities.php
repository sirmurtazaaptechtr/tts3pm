<?php 
    include('include/header.php');
    $showallcities_sql = "SELECT * FROM `cities`";

    $rows = mysqli_query($conn,$showallcities_sql);

    // echo "<pre>";
    // print_r($rows);
    // echo "</pre>";

    // foreach($rows as $row) {
    //     // echo "<pre>";
    //     // print_r($row);
    //     // echo "</pre>";
    //     echo $row['id'] . "|" . $row['city_name'] . "|" . $row['lng'] . "|" . $row['lat'] . "<br>";
    // }    
?>
<main id="main" class="main">

<div class="pagetitle">
  <h1>Cities</h1>
  <nav>
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="index.html">Home</a></li>
      <li class="breadcrumb-item">Cities</li>
    </ol>
  </nav>
</div><!-- End Page Title -->

<section class="section">
  <div class="row">
    <div class="col-lg-12">

      <div class="card">
        <div class="card-body">
          <h5 class="card-title">List of All Cities</h5>          

          <!-- Table with stripped rows -->
          <table class="table datatable">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">City ID</th>
                <th scope="col">City Name</th>
                <th scope="col">Longitude</th>
                <th scope="col">Latitude</th>
              </tr>
            </thead>
            <tbody>
              <?php
              $srno = 1;
              foreach($rows as $row)
              {
              ?>
              <tr>
                <th scope="row"><?php echo $srno; ?></th>
                <td><?php echo $row['id'] ?></td>
                <td><?php echo $row['city_name'] ?></td>
                <td><?php echo $row['lng'] ?></td>
                <td><?php echo $row['lat'] ?></td>
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