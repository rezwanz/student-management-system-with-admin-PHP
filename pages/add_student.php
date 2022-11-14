<?php
include 'includes/header.php';
include 'database.php';

if (isset($_REQUEST['submit_btn']) && !empty($_FILES)) {
    $imageDirectory = "assets/img/";
    $imageName = basename($_FILES["image"]["name"]);
    $filePath = $imageDirectory.$imageName;

    if (move_uploaded_file($_FILES["image"]["tmp_name"], $filePath))
    {
    $sql = "INSERT INTO student_info (std_id, first_name, last_name, email, mobile, address, gender, dob, image, dept_id)
    VALUES ('" . $_REQUEST['std_id'] . "', '" . $_REQUEST['first_name'] . "', '" . $_REQUEST['last_name'] . "', '" . $_REQUEST['email'] . "', '" . $_REQUEST['mobile'] . "', '" . $_REQUEST['address'] . "', '" . $_REQUEST['gender'] . "', '" . $_REQUEST['dob'] . "', '" . $_FILES ["image"]["name"] . "', '" . $_REQUEST['dept_id'] . "')";

    if (mysqli_query($connect, $sql))
    {
        echo "Student registration successful!";
    }
    else
        {
            echo "Error: " . $sql . "<br>" . mysqli_error($connect);
        }
    }
    else
        {
            echo "Sorry, there was an error uploading your file!";
        }
}
?>

    <section class="py-5">
        <div class="container">
            <div class="row">
                <div class="col-md-6 mx-auto">
                    <div class="card card-header">
                        <h4 class="text-center">Registration Form</h4>
                    </div>
                    <div class="card card-body">
                        <form method="post" action="action.php?page=add_student" enctype="multipart/form-data">
                            <div class="row mt-3">
                                <label for="std_id" class="col-md-4">Student ID</label>
                                <div class="col-md-8">
                                    <input type="text" name="std_id" class="form-control" />
                                </div>
                            </div>
                            <div class="row mt-3">
                                <label for="first_name" class="col-md-4">First Name</label>
                                <div class="col-md-8">
                                    <input type="text" name="first_name" class="form-control" />
                                </div>
                            </div>
                            <div class="row mt-3">
                                <label for="last_name" class="col-md-4">Last Name</label>
                                <div class="col-md-8">
                                    <input type="text" name="last_name" class="form-control" />
                                </div>
                            </div>
                            <div class="row mt-3">
                                <label for="email" class="col-md-4">Email</label>
                                <div class="col-md-8">
                                    <input type="email" name="email" class="form-control" />
                                </div>
                            </div>
                            <div class="row mt-3">
                                <label for="mobile" class="col-md-4">Mobile</label>
                                <div class="col-md-8">
                                    <input type="number" name="mobile" class="form-control" />
                                </div>
                            </div>
                            <div class="row mt-3">
                                <label for="address" class="col-md-4">Address</label>
                                <div class="col-md-8">
                                    <textarea name="address" class="form-control" cols="30" rows="10"></textarea>
                                </div>
                            </div>
                            <div class="row mt-3">
                                <label for="" class="col-md-4">Gender</label>
                                <div class="col-md-8">
                                    <label for=""><input type="radio" name="gender" value="male" checked> Male</label>
                                    <label for=""><input type="radio" name="gender" value="female"> Female</label>
                                    <label for=""><input type="radio" name="gender" value="other"> Other</label>
                                </div>
                            </div>
                            <div class="row mt-3">
                                <label for="" class="col-md-4">Date of Birth</label>
                                <div class="col-md-8">
                                    <input type="date" name="dob" class="form-control">
                                </div>
                            </div>
                            <div class="row mt-3">
                                <label for="" class="col-md-4">Image</label>
                                <div class="col-md-8">
                                    <input type="file" name="image" class="form-control /">
                                </div>
                            </div>
                            <div class="row mt-3">
                                <label for="" class="col-md-4">Department</label>
                                <div class="col-md-8">
                                    <select name="dept_id" value="<?php echo $rows['dept_id']; ?>" id="" class="form-select form-control">
                                        <option value="" disabled selected>Select Department</option>
                                        <?php
                                        $result = (mysqli_query($connect, "SELECT dept_id FROM department"));
                                        while($rows = mysqli_fetch_assoc($result)) {
                                            ?>
                                            <option value="<?php echo $rows['dept_id']?>"><?php echo $rows['dept_id']?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                            <div class="row mt-3">
                                <label for="" class="col-md-4"></label>
                                <div class="col-md-8">
                                    <input type="submit" name="submit_btn" value="Add Student" class="btn btn-success" />
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

<?php
include 'includes/footer.php';
?>