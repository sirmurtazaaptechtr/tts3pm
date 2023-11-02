<?php
include('include/header.php');
// define variables and set to empty values
$nameErr = $emailErr = $ageErr = $city_idErr = "";
$userid = $name = $email = $age = $city_id = "";

if ($_SERVER["REQUEST_METHOD"] == "GET") {
    if(isset($_GET['userid']) && $_GET['action'] == 'edit') {
        $userid = $_GET['userid'];        
        $showstudent_sql = "SELECT * FROM `users` WHERE id = $userid";
        $student = mysqli_query($conn,$showstudent_sql);
        foreach($student as $data)
        {
            $name = $data['name'];         
            $email = $data['email'];         
            $age = $data['age'];         
            $city_id = $data['city_id'];
        }
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $userid = $_POST['userid'];
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
        if($city_id <= 0 || empty($city_id) || $city_id == "") {
            $city_idErr = "Invalid City!";
        }
    }

    if(isset($_POST['update'])) {
        if($nameErr == '' && $emailErr == '' && $ageErr == '' && $city_idErr == '') {
            $updatestudent_sql = "UPDATE `users` SET `name` = '$name', `age` = $age, `email` = '$email', `city_id` = $city_id WHERE id = $userid";
            $isUpdated = mysqli_query($conn,$updatestudent_sql);
            header('Location: students.php');
            exit;
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
                        <p><p class="text-danger">* required field</p></p>
                        <!-- General Form Elements -->
                        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
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