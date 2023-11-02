<?php require "include/connection.php"; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Register - My School</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="assets/img/favicon.png" rel="icon">
    <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.gstatic.com" rel="preconnect">
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
        rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
    <link href="assets/vendor/quill/quill.snow.css" rel="stylesheet">
    <link href="assets/vendor/quill/quill.bubble.css" rel="stylesheet">
    <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
    <link href="assets/vendor/simple-datatables/style.css" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="assets/css/style.css" rel="stylesheet">

    <!-- =======================================================
  * Template Name: NiceAdmin
  * Updated: May 30 2023 with Bootstrap v5.3.0
  * Template URL: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>
    <?php
    // define variables and set to empty values
    $uploadErr = [];
    $nameErr = $emailErr = $ageErr = $city_idErr = $target_file = "";
    $username = $password = $usertype = $role_id = $name = $email = $age = $city_id =
        "";

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $target_dir = "assets/img/users/";
        $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
        $uploadOk = true;
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

        // Check if image file is a actual image or fake image
        if (isset($_POST["submit"])) {
            $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
            if ($check !== false) {
                echo "File is an image - " . $check["mime"] . ".";
                $uploadOk = true;
            } else {
                array_push($uploadErr,"File is not an image.");
                $uploadOk = false;
            }
        }

        // Check if file already exists
        if (file_exists($target_file)) {
            array_push($uploadErr,"Sorry, file already exists.");
            $uploadOk = false;
        }

        // Check file size
        if ($_FILES["fileToUpload"]["size"] > 500000) {
            array_push($uploadErr,"Sorry, your file is too large.");
            $uploadOk = false;
        }

        // Allow certain file formats
        if (
            $imageFileType != "jpg" &&
            $imageFileType != "png" &&
            $imageFileType != "jpeg" &&
            $imageFileType != "gif"
        ) {
            array_push($uploadErr,"Sorry, only JPG, JPEG, PNG & GIF files are allowed.");
            $uploadOk = false;
        }

        // Check if $uploadOk is set to 0 by an error
        if (!$uploadOk) {
            array_push($uploadErr,"Sorry, your file was not uploaded.");
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
                array_push($uploadErr,"Sorry, there was an error uploading your file.");
            }
        }
        $usertype = test_input($_POST["usertype"]);
        $username = test_input($_POST["username"]);
        $password = mysqli_real_escape_string($conn, $_POST["password"]);

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
        } elseif ($_POST["age"] < 1) {
            $ageErr = "Age must be Positive Number";
        } else {
            $age = test_input($_POST["age"]);
        }
        if (empty($_POST["city_id"]) || $_POST["city_id"] < 1) {
            $city_idErr = "Invalid City";
        } else {
            $city_id = test_input($_POST["city_id"]);
        }
    }
    if (isset($_POST["submit"])) {        
        if (
            empty($uploadErr) &&
            empty($nameErr) &&
            empty($emailErr) &&
            empty($ageErr) &&
            empty($city_idErr)
        ) {
            // prx($_POST);
            if ($usertype == "student") {
                $role_id = 3;
            } else {
                $role_id = 2;
            }
            $regstudent_sql = "INSERT INTO `users` (name, email, age, city_id, type, image) VALUES ('$name', '$email', '$age', '$city_id','$usertype','$target_file')";
            if (mysqli_query($conn, $regstudent_sql)) {
                // Get the last inserted ID
                $lastInsertedID = mysqli_insert_id($conn);
                $reglogin_sql = "INSERT INTO `login` (username,password,user_id,role_id) VALUES ('$username','$password','$lastInsertedID','$role_id')";
                if (mysqli_query($conn, $reglogin_sql)) {
                    //   echo "New record created successfully";
                    header("Location: index.php");
                    exit();
                } else {
                    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
                }
            }
        }
    }
    ?>

    <main>
        <div class="container">

            <section
                class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-4 col-md-6 d-flex flex-column align-items-center justify-content-center">

                            <div class="d-flex justify-content-center py-4">
                                <a href="index.php" class="logo d-flex align-items-center w-auto">
                                    <img src="assets/img/logo.png" alt="">
                                    <span class="d-none d-lg-block">My School</span>
                                </a>
                            </div><!-- End Logo -->

                            <div class="card mb-3">

                                <div class="card-body">

                                    <div class="pt-4 pb-2">
                                        <h5 class="card-title text-center pb-0 fs-4">Create an Account</h5>
                                        <p class="text-center small">Enter your personal details to create account</p>
                                    </div>
                                    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" enctype="multipart/form-data" class="row g-3 needs-validation" novalidate>
                                    <div class="col-12">
                                        <label for="fileToUpload" class="form-label">Select image to upload</label>
                                        <input type="file" class="form-control" name="fileToUpload" id="fileToUpload" aria-label="User Image" required>
                                        <div class="text-danger"><ul><?php foreach($uploadErr as $Err){echo "<li>$Err</li>";} ?></ul></div>
                                    </div>
                                    <div class="col-12">
                                            <fieldset class="row mb-3">
                                                <label class="form-label">User Type</label>
                                                <div class="col-sm-10">
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="usertype"
                                                            id="student" value="student" checked>
                                                        <label class="form-check-label" for="student">
                                                            Student
                                                        </label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="usertype"
                                                            id="teacher" value="teacher">
                                                        <label class="form-check-label" for="teacher">
                                                            Teacher
                                                        </label>
                                                    </div>                                                    
                                                </div>
                                            </fieldset>
                                        </div>
                                        <div class="col-12">
                                            <label for="yourName" class="form-label">Full Name</label>
                                            <input type="text" name="name" class="form-control" id="yourName" required
                                                value="<?php echo $name; ?>">
                                            <div class="invalid-feedback">Please, enter your name!
                                                <?php echo $nameErr; ?>
                                            </div>
                                        </div>

                                        <div class="col-12">
                                            <label for="yourEmail" class="form-label">Email Address</label>
                                            <input type="email" name="email" class="form-control" id="yourEmail"
                                                required value="<?php echo $email; ?>">
                                            <div class="invalid-feedback">Please enter a valid Email adddress!
                                                <?php echo $emailErr; ?>
                                            </div>
                                        </div>

                                        <div class="col-12">
                                            <label for="yourAge" class="form-label">Age</label>
                                            <input type="number" name="age" class="form-control" id="yourAge" min="0"
                                                required value="<?php echo $age; ?>">
                                            <div class="invalid-feedback">Please enter a valid age!
                                                <?php echo $ageErr; ?>
                                            </div>
                                        </div>

                                        <div class="col-12">
                                            <label class="form-label">City</label>
                                            <select class="form-select" name="city_id" id="city_id"
                                                aria-label="Select city" required>
                                                <option value="0" selected>Select a City</option>
                                                <?php
                                                $showcities_sql =
                                                    "SELECT * FROM `cities`";
                                                $cities = mysqli_query(
                                                    $conn,
                                                    $showcities_sql
                                                );
                                                foreach ($cities as $city) { ?>
                                                <option value="<?php echo $city[
                                                    "id"
                                                ]; ?>">
                                                    <?php echo $city[
                                                        "city_name"
                                                    ]; ?>
                                                </option>
                                                <?php }
                                                ?>
                                            </select>
                                            <div class="invalid-feedback">Please select a city!
                                                <?php echo $city_idErr; ?>
                                            </div>
                                        </div>

                                        <div class="col-12">
                                            <label for="yourUsername" class="form-label">Username</label>
                                            <div class="input-group has-validation">
                                                <span class="input-group-text" id="inputGroupPrepend">@</span>
                                                <input type="text" name="username" class="form-control"
                                                    id="yourUsername" required value="<?php echo $username; ?>">
                                                <div class="invalid-feedback">Please choose a username.</div>
                                            </div>
                                        </div>

                                        <div class="col-12">
                                            <label for="yourPassword" class="form-label">Password</label>
                                            <input type="password" name="password" class="form-control"
                                                id="yourPassword" required value="<?php echo $username; ?>">
                                            <div class="invalid-feedback">Please enter your password!</div>
                                        </div>

                                        <div class="col-12">
                                            <div class="form-check">
                                                <input class="form-check-input" name="terms" type="checkbox" value=""
                                                    id="acceptTerms" required>
                                                <label class="form-check-label" for="acceptTerms">I agree and accept the
                                                    <a href="#">terms and conditions</a></label>
                                                <div class="invalid-feedback">You must agree before submitting.</div>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <button class="btn btn-primary w-100" type="submit" name="submit" id="submit">Create Account</button>
                                        </div>
                                        <div class="col-12">
                                            <p class="small mb-0">Already have an account? <a href="index.php">Login</a></p>
                                        </div>
                                    </form>

                                </div>
                            </div>

                            <div class="credits">
                                <!-- All the links in the footer should remain intact. -->
                                <!-- You can delete the links only if you purchased the pro version. -->
                                <!-- Licensing information: https://bootstrapmade.com/license/ -->
                                <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/ -->
                                Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
                            </div>

                        </div>
                    </div>
                </div>

            </section>

        </div>
    </main><!-- End #main -->

    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>

    <!-- Vendor JS Files -->
    <script src="assets/vendor/apexcharts/apexcharts.min.js"></script>
    <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="assets/vendor/chart.js/chart.umd.js"></script>
    <script src="assets/vendor/echarts/echarts.min.js"></script>
    <script src="assets/vendor/quill/quill.min.js"></script>
    <script src="assets/vendor/simple-datatables/simple-datatables.js"></script>
    <script src="assets/vendor/tinymce/tinymce.min.js"></script>
    <script src="assets/vendor/php-email-form/validate.js"></script>

    <!-- Template Main JS File -->
    <script src="assets/js/main.js"></script>

</body>

</html>