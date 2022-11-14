<?php
include 'includes/header.php';
include 'database.php';

if (isset($_REQUEST['add_course']))
{
    date_default_timezone_set('Asia/Dhaka');
    $time = date('H:i:s A');
    $date = date('Y/m/d');

    $sql = "INSERT INTO courses (dept_id, course_id, course_name, created_at)
    VALUES ('". $_REQUEST['dept_id'] ."', '". $_REQUEST['course_id'] ."', '". $_REQUEST['course_name'] ."', '". $date.' '.$time."')";

    if (mysqli_query($connect, $sql))
    {
        echo "Course added successful!";
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
                            <h4 class="text-center">Course Registration</h4>
                        </div>
                        <div class="card-body">
                            <form action="" method="post">
                                <div class="row mt-3">
                                    <label for="" class="col-md-4">Department</label>
                                    <div class="col-md-8">
                                        <select name="dept_id" value="<?php echo $rows['dept_name']; ?>" id="" class="form-select form-control">
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
                                    <label for="" class="col-md-4">Course ID</label>
                                    <div class="col-md-8">
                                        <input type="text" name="course_id" class="form-control" />
                                    </div>
                                </div>
                                <div class="row mt-3">
                                    <label for="" class="col-md-4">Course Name</label>
                                    <div class="col-md-8">
                                        <input type="text" name="course_name" class="form-control" />
                                    </div>
                                </div>
                                <div class="row mt-3">
                                    <label for="" class="col-md-4"></label>
                                    <div class="col-md-8">
                                        <input type="submit" name="add_course" value="Add Course" class="btn btn-success" />
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
