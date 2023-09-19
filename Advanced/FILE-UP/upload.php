<?php require('header.inc.php'); ?>
<div class="container">
<?php
    $target_dir = "images/";
    $target_file = $target_dir . basename($_FILES['fileToUpload']['name']);    
    $uploadOk = true;
    // prx($_FILES);
    
    // Check if file already exists
    if (file_exists($target_file)) {        
        echo '
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Sorry!</strong> file already exists.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>';
        $uploadOk = false;
    }
    // Check file size not > 1MB
    if ($_FILES["fileToUpload"]["size"] > 1242880) {
        echo '
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Sorry!</strong> your file is too large.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>';
        $uploadOk = false;
    }
    // Check if $uploadOk is set to 0 by an error
    if (!$uploadOk) {
        echo '
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Sorry!</strong> your file was not uploaded.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>';
        // if everything is ok, try to upload file
    } else {
        if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
            echo '
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Uploaded successfully!</strong> The file '. htmlspecialchars( basename( $_FILES["fileToUpload"]["name"])). ' has been uploaded.
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>';
        } else {
            echo '
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>Sorry!</strong>  there was an error uploading your file.
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>';
        }
    }
?>

<?php require('footer.inc.php'); ?>
</div>