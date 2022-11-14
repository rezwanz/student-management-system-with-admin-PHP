<?php
include 'includes/header.php';
include 'database.php';
$admin = '';
if ($_SESSION['user_type'] == 'student')
{
    $admin = "WHERE std_id='".$_SESSION['person_role']."'";
}
$query = "SELECT * FROM course_reg $admin ";
$result = mysqli_query($connect, $query);

if (isset($_REQUEST['registered_courses_delete']))
{
    $id = $_REQUEST['registered_courses_delete'];
    $query = "DELETE FROM course_reg WHERE id=$id";
    $result = mysqli_query($connect, $query);
    header('Location: action.php?page=manage_registered_courses');
}
?>

    <section class="py-5">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <table class="table table-bordered table-responsive table-striped" id="dashboard">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Student ID</th>
                            <th>Department</th>
                            <th>Semester</th>
                            <th>Courses</th>
                            <th>Created at</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <?php
                        while($rows = mysqli_fetch_assoc($result)) {
                            ?>
                            <tbody>
                            <tr>
                                <td><?php echo $rows['id']?></td>
                                <td><?php echo $rows['std_id']?></td>
                                <td><?php echo $rows['dept_id']?></td>
                                <td><?php echo $rows['semester']?></td>
                                <td><?php echo $rows['course_id']?></td>
                                <td><?php echo $rows['created_at']?></td>
                                <td>
                                    <a href="action.php?page=edit_registered_courses&edit_registered_courses=<?php echo $rows['std_id'];?> &edit_registered_courses1=<?php echo $rows['id'];?>" class="btn btn-primary btn-sm">
                                        <i class="fa fa-edit"></i>
                                    </a>
                                    <a href="action.php?registered_courses_delete=<?php echo $rows['id']?>" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure, You want to delete this information?')">
                                        <i class="fa fa-trash"></i>
                                    </a>
                                </td>
                            </tr>
                            </tbody>
                        <?php } ?>
                    </table>
                </div>
            </div>
        </div>
    </section>

<?php
include 'includes/footer.php';
?>