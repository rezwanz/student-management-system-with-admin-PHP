<?php
include 'includes/header.php';
include 'database.php';

$id = $_REQUEST['edit_course'];
$query = "SELECT * FROM courses WHERE id='". $id."'";

$result = mysqli_query($connect, $query);
$rows = mysqli_fetch_assoc($result);
$result1= mysqli_query($connect, $query);
$rows = mysqli_fetch_assoc($result1);
$id1 =  $rows['dept_id'];
if (isset($_REQUEST['update_course'])) {
    $id = $_REQUEST['edit_course'];
    $id1 = '';
    date_default_timezone_set('Asia/Dhaka');
    $time = date('H:i:s A');
    $date = date('Y/m/d');

    $update = "UPDATE courses SET dept_id = '". $_REQUEST['dept_id'] ."', course_id='" . $_REQUEST['course_id'] . "', course_name='" . $_REQUEST['course_name'] . "', created_at='". $date.' '.$time."' WHERE id = '".$id."' ";

    if (mysqli_query($connect, $update))
    {
        echo "Record updated successfully!";
    }
    else
    {
        echo "Error: " . $sql . "<br>" . mysqli_error($connect);
    }
}
?>

    <section class="py-5">
        <div class="container">
            <div class="row">
                <div class="col-md-6 mx-auto">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="text-center">Update Course</h4>
                        </div>
                        <div class="card-body">
                            <form action="" method="post">
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
                                    <label for="" class="col-md-4">Course ID</label>
                                    <div class="col-md-8">
                                        <input type="text" name="course_id" value="<?php echo $rows['course_id']; ?>" class="form-control" />
                                    </div>
                                </div>
                                <div class="row mt-3">
                                    <label for="" class="col-md-4">Course Name</label>
                                    <div class="col-md-8">
                                        <input type="text" name="course_name" value="<?php echo $rows['course_name']; ?>" class="form-control" />
                                    </div>
                                </div>
                                <div class="row mt-3">
                                    <label for="" class="col-md-4"></label>
                                    <div class="col-md-8">
                                        <input type="submit" name="update_course" value="Update Course" class="btn btn-success" />
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

<?php
include "includes/footer.php"
?>
