<?php
include "include/header.php";
// define variables and set to empty values
$uploadErr = [];
$nameErr = $emailErr = $ageErr = $city_idErr = "";
$target_file = $userid = $name = $email = $age = $city_id = "";

if ($_SERVER["REQUEST_METHOD"] == "GET") {
    if (isset($_GET["userid"]) && $_GET["action"] == "edit") {
        $userid = $_GET["userid"];
        $showstudent_sql = "SELECT * FROM `users` WHERE id = $userid";
        $student = mysqli_query($conn, $showstudent_sql);
        foreach ($student as $data) {
            $name = $data["name"];
            $email = $data["email"];
            $age = $data["age"];
            $city_id = $data["city_id"];
            $target_file = $data["image"];
        }
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (!empty($_FILES['fileToUpload'])) {
        $target_dir = "assets/img/users/";
        $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
        $uploadOk = true;
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

        // Check if image file is a actual image or fake image
        if (isset($_POST["update"])) {
            $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
            if ($check !== false) {
                echo "File is an image - " . $check["mime"] . ".";
                $uploadOk = true;
            } else {
                array_push($uploadErr, "File is not an image.");
                $uploadOk = false;
            }
        }

        // Check if file already exists
        if (file_exists($target_file)) {
            array_push($uploadErr, "Sorry, file already exists.");
            $uploadOk = false;
        }
    
        // Check file size
        if ($_FILES["fileToUpload"]["size"] > 10485760) {
            array_push($uploadErr, "Sorry, your file is too large.");
            $uploadOk = false;
        }
    
        // Allow certain file formats
        if (
            $imageFileType != "jpg" &&
            $imageFileType != "png" &&
            $imageFileType != "jpeg" &&
            $imageFileType != "gif"
        ) {
            array_push(
                $uploadErr,
                "Sorry, only JPG, JPEG, PNG & GIF files are allowed."
            );
            $uploadOk = false;
        }
    
        // Check if $uploadOk is set to 0 by an error
        if (!$uploadOk) {
            array_push($uploadErr, "Sorry, your file was not uploaded.");
            // if everything is ok, try to upload file
        } else {
            if (
                move_uploaded_file(
                    $_FILES["fileToUpload"]["tmp_name"],
                    $target_file
                )
            ) {
                echo "The file " .
                    htmlspecialchars(basename($_FILES["fileToUpload"]["name"])) .
                    " has been uploaded.";
            } else {
                array_push(
                    $uploadErr,
                    "Sorry, there was an error uploading your file."
                );
            }
        }
    }else {
        $uploadErr = [];
        $target_file = $_POST['imageUrl'];
    }
    $userid = $_POST["userid"];
    if (empty($_POST["name"])) {
        $nameErr = "Name is required";
    } else {
        $name = test_input($_POST["name"]);
        // check if name only contains letters and whitespace
        if (!preg_match("/^[a-zA-Z-' ]*$/", $name)) {
            $nameErr = "Only letters and white space allowed";
        }
    }

    if (empty($_POST["email"])) {
        $emailErr = "Email is required";
    } else {
        $email = test_input($_POST["email"]);
        // check if e-mail address is well-formed
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $emailErr = "Invalid email format";
        }
    }

    if (empty($_POST["age"])) {
        $ageErr = "Age is required";
    } else {
        $age = test_input($_POST["age"]);
        // check if age only contains numbers
        if (!preg_match("/^[1-9]\d*$/", $age)) {
            $ageErr = "Only positive numbers are allowed";
        }
    }
    if (empty($_POST["city_id"])) {
        $city_idErr = "Select City";
    } else {
        $city_id = test_input($_POST["city_id"]);
        if ($city_id <= 0 || empty($city_id) || $city_id == "") {
            $city_idErr = "Invalid City!";
        }
    }

    if (isset($_POST["update"])) {        
        if (
            empty($uploadErr) &&
            $nameErr == "" &&
            $emailErr == "" &&
            $ageErr == "" &&
            $city_idErr == ""
        ) {            
            $updatestudent_sql = "UPDATE `users` SET `name` = '$name', `age` = $age, `email` = '$email', `city_id` = $city_id, `image` = '$target_file' WHERE id = $userid";
            $isUpdated = mysqli_query($conn, $updatestudent_sql);
            header("Location: students.php");
            exit();
        }
    }
}

?>

<main id="main" class="main">
    <div class="pagetitle">
        <h1>Update Student</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                <li class="breadcrumb-item"><a href="students.php">Students</a></li>
                <li class="breadcrumb-item active">Update Student</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->
    <section class="section">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Update Student</h5>
                        <p>
                        <p class="text-danger">* required field</p>
                        </p>
                        <!-- General Form Elements -->
                        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" enctype="multipart/form-data">
                            <div class="row mb-3">
                                <div class="card">
                                <div class="row mb-3">
                                <label for="imageUrl" class="col-sm-2 col-form-label">Image URL</label>
                                <div class="col-sm-5">
                                    <input type="text" readonly class="form-control-plaintext" id="imageUrl" name="imageUrl" value="<?php echo $target_file; ?>">
                                </div>
                            </div>
                                <div class="card-image" style="width: 100px;">
                                    <img id="frame" src="<?php echo $target_file; ?>" class="card-img-top rounded img-thumbnail img-fluid"/>
                                </div>
                                    <div class="card-body">
                                        <h5 class="card-title">User Image</h5>
                                        <div class="card-text">
                                            <div class="row mb-5">
                                                <label for="Image" class="form-label">Select image to upload</label>
                                                <div class="col-sm-5">
                                                    <input class="form-control" type="file" id="formFile" name="fileToUpload" onchange="preview()">
                                                    <button onclick="clearImage()" class="btn btn-primary mt-3">Clear Image</button>
                                                </div>
                                                <div class="text-danger"><ul><?php foreach($uploadErr as $Err){echo "<li>$Err</li>";} ?></ul></div>
                                            </div>
                                        </div>
                                        <script>
                                            function preview() {
                                                frame.src = URL.createObjectURL(event.target.files[0]);
                                            }

                                            function clearImage() {
                                                document.getElementById('formFile').value = null;
                                                frame.src = "";
                                            }
                                        </script>
                                    </div>
                                </div>

                            </div>
                            <div class="row mb-3">
                                <label for="userid" class="col-sm-2 col-form-label">Student ID</label>
                                <div class="col-sm-5">
                                    <input type="text" readonly class="form-control-plaintext" id="userid" name="userid" value="<?php echo $userid; ?>">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="name" class="col-sm-2 col-form-label">Name</label>
                                <div class="col-sm-5">
                                    <input type="text" name="name" id="name" class="form-control" value="<?php echo $name; ?>">
                                </div>
                                <p class="text-danger col-sm-5">* <?php echo $nameErr; ?></p>
                            </div>
                            <div class="row mb-3">
                                <label for="email" class="col-sm-2 col-form-label">Email</label>
                                <div class="col-sm-5">
                                    <input type="email" name="email" id="email" class="form-control" value="<?php echo $email; ?>">
                                </div>
                                <p class="text-danger col-sm-5">* <?php echo $emailErr; ?></p>
                            </div>
                            <div class="row mb-3">
                                <label for="age" class="col-sm-2 col-form-label">Age</label>
                                <div class="col-sm-5">
                                    <input type="number" name="age" id="age" min="1" class="form-control" value="<?php echo $age; ?>">
                                </div>
                                <p class="text-danger col-sm-5">* <?php echo $ageErr; ?></p>
                            </div>
                            <div class="row mb-3">
                                <label for="citiesDataList" class="col-sm-2 col-form-label">City</label>
                                <div class="col-sm-5">
                                    <input list="datalistOptions" id="citiesDataList" name="city_id" placeholder="Type to search city..." class="form-control" value="<?php echo $city_id; ?>">
                                    <datalist id="datalistOptions">
                                        <?php
                                        $showallcities_sql = "SELECT * FROM `cities`";
                                        $rows = mysqli_query($conn, $showallcities_sql);
                                        foreach ($rows as $city) {
                                        ?>
                                            <option value="<?php echo $city['id']; ?>">
                                                <?php echo $city['city_name']; ?>
                                            </option>
                                        <?php
                                        }
                                        ?>
                                    </datalist>
                                </div>
                                <p class="text-danger col-sm-5">* <?php echo $city_idErr; ?></p>
                            </div>
                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label">Actions</label>
                                <div class="col-sm-5">
                                    <button type="submit" name="update" id="update" class="btn btn-warning">Update</button>
                                </div>
                            </div>
                        </form><!-- End General Form Elements -->
                    </div>
                </div>
            </div>
        </div>
    </section>
</main><!-- End #main -->

<?php include('include/footer.php'); ?>