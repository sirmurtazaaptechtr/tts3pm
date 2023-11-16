<?php include('include/header.php') ?>

<?php
$catid = $_GET['catid'];
$catname = $_GET['catname'];
$sql = "SELECT *
        FROM `products`       
        WHERE  `products`.`CategoryID` = $catid";
$products = mysqli_query($conn, $sql);
?>
<div class="d-flex justify-content-center align-items-center mt-5"> <button class="btn btn-dark"><?php echo $catname?></button> </div>
<div class="d-flex justify-content-center mt-3"> <span class="text text-center">Finding Best Products Now<br> in Your Fingertips</span> </div>
<div class="row mt-2 g-4">
    <?php
    foreach($products as $product)
    {
    ?>
    <div class="col-md-3">
        <div class="card p-1">
            <div class="d-flex flex-column justify-content-between align-items-center p-2">
                <div class="flex-column lh-1 imagename"> <span><?php echo $product['ProductName'] ?></span> </div>
                <div> <span><?php echo $product['Price'] ?></span> per <span><?php echo $product['Unit'] ?></span> </div>
            </div>
        </div>
    </div>
    <?php
    }
    ?>
</div>

<?php include('include/footer.php') ?>