<?php
include 'includes/header.php';
include 'database.php';

$id = $_REQUEST['edit_student'];
$query = "SELECT * FROM student_info WHERE std_id='". $id."'";
$result = mysqli_query($connect, $query);
$rows = mysqli_fetch_assoc($result);
$result1= mysqli_query($connect, $query);
$rows = mysqli_fetch_assoc($result1);
@$id1 =  $rows['dept_id'];

if (isset($_REQUEST['update_btn']) && !empty($_FILES)) {
    $id = $_REQUEST['edit_student'];
    $id1 = '';
    $imageDirectory = "assets/img/";
    $imageName = basename($_FILES["image"]["name"]);
    $filePath = $imageDirectory.$imageName;

    if (move_uploaded_file($_FILES["image"]["tmp_name"], $filePath))
    {
       $update = "UPDATE student_info SET std_id='" . $_REQUEST['std_id'] . "',  first_name='" . $_REQUEST['first_name'] . "', last_name='" . $_REQUEST['last_name'] . "', email='" . $_REQUEST['email'] . "', mobile='" . $_REQUEST['mobile'] . "', address='" . $_REQUEST['address'] . "', gender='" . $_REQUEST['gender'] . "', dob='" . $_REQUEST['dob'] . "', image='" . $_FILES ["image"]["name"] . "', dept_id = '". $_REQUEST['dept_id'] ."' WHERE std_id = '".$id."' ";

        if (mysqli_query($connect, $update))
        {
            echo "Record updated successfully!";
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
                    <div class="card-header">
                        <h4 class="text-center">Update Student Information</h4>
                    </div>
                    <div class="card card-body">
                        <form method="post" action="" enctype="multipart/form-data">
                            <div class="row mt-3">
                                <label for="std_id" class="col-md-4">Student ID</label>
                                <div class="col-md-8">
                                    <input type="text" name="std_id" value="<?php echo $rows['std_id']; ?>" class="form-control" />
                                </div>
                            </div>
                            <div class="row mt-3">
                                <label for="first_name" class="col-md-4">First Name</label>
                                <div class="col-md-8">
                                    <input type="text" name="first_name" value="<?php echo $rows['first_name']; ?>" class="form-control" />
                                </div>
                            </div>
                            <div class="row mt-3">
                                <label for="last_name" class="col-md-4">Last Name</label>
                                <div class="col-md-8">
                                    <input type="text" name="last_name" value="<?php echo $rows['last_name']; ?>" class="form-control" />
                                </div>
                            </div>
                            <div class="row mt-3">
                                <label for="email" class="col-md-4">Email</label>
                                <div class="col-md-8">
                                    <input type="email" name="email" value="<?php echo $rows['email']; ?>" class="form-control" />
                                </div>
                            </div>
                            <div class="row mt-3">
                                <label for="mobile" class="col-md-4">Mobile</label>
                                <div class="col-md-8">
                                    <input type="number" name="mobile" value="<?php echo $rows['mobile']; ?>" class="form-control" />
                                </div>
                            </div>
                            <div class="row mt-3">
                                <label for="address" class="col-md-4">Address</label>
                                <div class="col-md-8">
                                    <textarea name="address" class="form-control" cols="30" rows="10"><?php echo $rows['address']; ?></textarea>
                                </div>
                            </div>

                            <div class="row mt-3">
                                <label for="" class="col-md-4">Gender</label>
                                <div class="col-md-8">
                                    <label for=""><input type="radio" name="gender" value="male"<?php echo $rows['gender'] == 'male' ? 'checked = "checked"' : ''; ?>> Male</label>
                                    <label for=""><input type="radio" name="gender" value="female"<?php echo $rows['gender'] == 'female' ? 'checked = "checked"' : ''; ?>> Female</label>
                                    <label for=""><input type="radio" name="gender" value="other"<?php echo $rows['gender'] == 'other' ? 'checked = "checked"' : ''; ?>> Other</label>
                                </div>
                            </div>
                            <div class="row mt-3">
                                <label for="" class="col-md-4">Date of Birth</label>
                                <div class="col-md-8">
                                    <input type="date" name="dob" value="<?php echo $rows['dob']; ?>" class="form-control">
                                </div>
                            </div>
                            <div class="row mt-3">
                                <label for="" class="col-md-4">Image</label>
                                <div class="col-md-8">
                                    <input type="file" name="image" class="form-control /">
                                    <img src="assets/img/<?php echo $rows['image']; ?>" alt="" style="height: 100px; width: 100px">
                                </div>
                            </div>
                            <div class="row mt-3">
                                <label for="" class="col-md-4">Department</label>
                                <div class="col-md-8">
                                    <select name="dept_id" id="" class="form-select form-control">
                                        <option value="" disabled selected>Select Department</option>
                                        <?php
                                        $result = (mysqli_query($connect, "SELECT * FROM department"));
                                        while($rows2 = mysqli_fetch_assoc($result)) {
                                            ?>
                                            <option value="<?php echo $rows2['dept_id']?>"<?php print (@$_REQUEST['dept_id'].$id1 == $rows2['dept_id'] ) ? 'selected = "selected"' : '' ?>><?php echo $rows2['dept_id']?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>

                            <div class="row mt-3">
                                <label for="" class="col-md-4"></label>
                                <div class="col-md-8">
                                    <input type="submit" name="update_btn" class="btn btn-success" />
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