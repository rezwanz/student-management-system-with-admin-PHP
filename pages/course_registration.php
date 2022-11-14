<?php
include 'includes/header.php';
include 'database.php';

if (isset($_REQUEST['course_reg']))
{
    date_default_timezone_set('Asia/Dhaka');
    $time = date('H:i:s A');
    $date = date('Y/m/d');
    $courses = '';

    foreach ($_REQUEST["courses"] as $course)
    {
        $courses.=$course.',';
    }

    $sql = "INSERT INTO course_reg (std_id, dept_id, semester, course_id, created_at) 
    VALUES ('". $_REQUEST ['std_id'] ."', '". $_REQUEST['dept_id'] ."', '". $_REQUEST['semester'] ."', '".$courses ."',  '".$date.' '.$time."')";

    if ( mysqli_query($connect, $sql))
    {
        echo 'Registration successful!';
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
                            <form action="action.php?page=course_registration" method="post">
                                <div class="row mt-3">
                                    <label for="" class="col-md-4">Student ID</label>
                                    <div class="col-md-8">
                                        <select name="std_id" value="<?php echo $rows['std_id']; ?>" id="" class="form-select form-control">
                                            <option value="" disabled selected>Select Student ID</option>
                                            <?php
                                            if ($_SESSION['user_type'] == 'student')
                                            {
                                                $admin = "SELECT std_id FROM student_info WHERE std_id = '".$_SESSION['person_role']."'";
                                            }
                                            else
                                            {
                                                $admin = "SELECT std_id FROM student_info";
                                            }
                                            $result = (mysqli_query($connect, $admin));
                                            while($rows = mysqli_fetch_assoc($result)) {
                                                ?>
                                                <option value="<?php echo $rows['std_id']?>"><?php echo $rows['std_id']?></option>
                                            <?php } ?>
                                        </select>
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
                                    <label for="" class="col-md-4">Semester</label>
                                    <div class="col-md-8">
                                        <input type="text" name="semester" class="form-control" />
                                    </div>
                                </div>
                                <div class="row mt-3">
                                    <label for="" class="col-md-4">Courses</label>
                                    <div class="col-md-8">
                                        <?php
                                        $result = (mysqli_query($connect, "SELECT course_id FROM courses"));
                                        while ($rows = mysqli_fetch_assoc($result)) {
                                            ?>
                                            <label for=""><input type="checkbox" class="course_class" name="courses[]" id="course_id" onclick="buttonEventHandler(this)" value="<?php echo $rows['course_id']?>"><?php echo $rows['course_id']?></label>
                                        <?php } ?>
                                    </div>
                                </div>
                                <div class="row mt-3">
                                    <label for="" class="col-md-4 form-control">Your selected courses: </label>
                                    <div class="col-md-8" id="selected_course"></div>
                                </div>
                                <div class="row mt-3">
                                    <label for="" class="col-md-4"></label>
                                    <div class="col-md-8">
                                        <input type="submit" name="course_reg" value="Submit" class="btn btn-success">
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
include 'includes/footer.php';
?>