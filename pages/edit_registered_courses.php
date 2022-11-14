<?php
include 'includes/header.php';
include 'database.php';
$ids= $_REQUEST['edit_registered_courses1'];
$id = $_REQUEST['edit_registered_courses'];

if (isset($_REQUEST['update_registered_courses'])) {
    $id = $_REQUEST['edit_registered_courses'];
    date_default_timezone_set('Asia/Dhaka');
    $time = date('H:i:s A');
    $date = date('Y/m/d');
    $courses = '';

    foreach ($_REQUEST["courses"] as $course)
    {
        $courses.=$course.',';
    }

    $update = "UPDATE course_reg SET std_id = '". $_REQUEST['std_id'] ."', dept_id='" . $_REQUEST['dept_id'] . "', semester='" . $_REQUEST['semester'] . "', course_id='" . $courses . "', created_at='". $date.' '.$time."' WHERE std_id = '".$id."' ";

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
                            <h4 class="text-center">Update Course Registration</h4>
                        </div>
                        <div class="card-body">
                            <form action="" method="post">
                                <input type="hidden" name="hidden_id"  value="<?php echo $_REQUEST['edit_registered_courses1']?>">
                                <?php
                                //print "SELECT * FROM course_reg WHERE id=  '".$_REQUEST['edit_registered_courses1']."'";
                                $result1 = (mysqli_query($connect, "SELECT * FROM course_reg WHERE id=  '".$_REQUEST['edit_registered_courses1']."'"));
                                while($rows1 = mysqli_fetch_assoc($result1))
                                { ?>
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
                                            while($rows = mysqli_fetch_assoc($result)) { ?>
                                                <option value="<?php echo $rows['std_id']?>"<?php echo ($rows['std_id']==$rows1['std_id']) ? "Selected" : "";?> ><?php echo $rows['std_id']; ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="row mt-3">
                                    <label for="" class="col-md-4">Department</label>
                                    <div class="col-md-8">
                                        <select name="dept_id" value="<?php echo $rows['dept_id']; ?>"  id="" class="form-select form-control">
                                            <option value="" disabled selected>Select Department</option>
                                            <?php
                                            $result = (mysqli_query($connect, "SELECT dept_id FROM department"));
                                            while($rows = mysqli_fetch_assoc($result)) {
                                                ?>
                                                <option value="<?php echo $rows['dept_id']?>" <?php echo ($rows['dept_id'] == $rows1['dept_id']) ? "Selected" : ""; ?>><?php echo $rows['dept_id']?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="row mt-3">
                                    <label for="" class="col-md-4">Semester</label>
                                    <div class="col-md-8">
                                      <?php
                                    $query = "SELECT * FROM course_reg WHERE std_id='". $id."'";
                                    $result = mysqli_query($connect, $query);
                                    while($rows = mysqli_fetch_assoc($result))
                                    { ?>
                                        <input type="text" value="<?php echo $rows['semester']; ?>" <?php echo ($rows['semester'] == $rows1['semester']) ? "Selected" : ""; ?> name="semester" class="form-control" />
                                   <?php }?>
                                    </div>
                                </div>
                                <div class="row mt-3">
                                    <label for="" class="col-md-4">Courses</label>
                                    <div class="col-md-8">
                                        <?php
                                        $i=0;
                                        $c_id=[];
                                        $c_id=explode(",", $rows1['course_id']);
                                        $result = (mysqli_query($connect, "SELECT course_id FROM courses"));
                                        while ($rows = mysqli_fetch_assoc($result))
                                        { ?>
                                            <label for=""><input type="checkbox" value="<?php echo $rows['course_id']; ?>"  <?php echo (in_array($rows['course_id'], $c_id) == true) ? "checked='checked'" : "";?> class="course_class" name="courses[]" id="course_id" onclick="buttonEventHandler(this)" value="<?php echo $rows['course_id']?>"><?php echo $rows['course_id']?></label>
                                        <?php } } ?>
                                    </div>
                                </div>
                                <div class="row mt-3">
                                    <label for="" class="col-md-4 form-control">Your selected courses: </label>
                                    <div class="col-md-8" id="selected_course"></div>
                                </div>
                                <div class="row mt-3">
                                    <label for="" class="col-md-4"></label>
                                    <div class="col-md-8">
                                        <input type="submit" name="update_registered_courses" value="Submit" class="btn btn-success">
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