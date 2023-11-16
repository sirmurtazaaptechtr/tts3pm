<?php
    include('include/header.php');
    $sql = "SELECT * FROM `categories`";
    $categories = mysqli_query($conn,$sql);
?>

    <div class="d-flex justify-content-center align-items-center mt-5"> <button class="btn btn-dark">OUR CATEGORIES</button> </div>
    <div class="d-flex justify-content-center mt-3"> <span class="text text-center">Finding Best Products Now<br> in Your Fingertips</span> </div>
    <div class="row mt-2 g-4">
        <?php
        foreach($categories as $category)
        {
        ?>
        <div class="col-md-3">
            <div class="card p-1">
                <div class="d-flex flex-column justify-content-between align-items-center p-2 mt-3">
                    <div class="flex-column lh-1 imagename"> <a href="provscat.php?catid=<?php echo $category['CategoryID'] . '&catname=' . $category['CategoryName']?>"><?php echo $category['CategoryName']?></a></div>
                    <div> <p><?php echo $category['Description']?></p> </div>
                </div>
            </div>
        </div>
        <?php
        }
        ?>        
    </div>
</div>
<?php include('include/footer.php'); ?>  
    