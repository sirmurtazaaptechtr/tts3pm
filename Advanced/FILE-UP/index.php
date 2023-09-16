<?php require('header.inc.php'); ?>
<div class="container">
    <form action="upload.php" method="post" enctype="multipart/form-data">
        <h4>Select image to upload</h4>
        <div class="input-group mb-3">
            <input type="file" class="form-control" id="fileToUpload" name="fileToUpload" >
            <button type="submit" class="btn btn-outline-secondary"id="submit" name="submit">
                Upload Image
            </button>
        </div>
    </form>
</div>    
<?php require('footer.inc.php'); ?>