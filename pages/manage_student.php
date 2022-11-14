<?php
include 'includes/header.php';
include 'database.php';
$admin = '';
if ($_SESSION['user_type'] == 'student')
{
    $admin = "WHERE std_id='".$_SESSION['person_role']."'";
}
$query = "SELECT * FROM student_info $admin ";
$result = mysqli_query($connect, $query);

if (isset($_REQUEST['delete']))
{
    $id = $_REQUEST['delete'];
    $query = "DELETE FROM student_info WHERE std_id=$id";
    $result = mysqli_query($connect, $query);
    header('Location: action.php?page=manage_student');
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
                                <th>First Name</th>
                                <th>Last Name</th>
                                <th>Email</th>
                                <th>Mobile</th>
                                <th>Address</th>
                                <th>Gender</th>
                                <th>Date of Birth</th>
                                <th>Image</th>
                                <th>Department</th>
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
                                    <td><?php echo $rows['first_name']?></td>
                                    <td><?php echo $rows['last_name']?></td>
                                    <td><?php echo $rows['email']?></td>
                                    <td><?php echo $rows['mobile']?></td>
                                    <td><?php echo $rows['address']?></td>
                                    <td><?php echo $rows['gender']?></td>
                                    <td><?php echo $rows['dob']?></td>
                                    <td>
                                        <img src="assets/img/<?php echo $rows['image']?>" alt="" style="height: 100px; width: 100px">
                                    </td>

                                    <td><?php echo $rows['dept_id']?></td>
                                    <td>
                                        <a href="action.php?page=edit_student&edit_student=<?php echo $rows['std_id']?>" class="btn btn-primary btn-sm">
                                            <i class="fa fa-edit"></i>
                                        </a>
                                        <a href="action.php?delete=<?php echo $rows['std_id']?>" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure, You want to delete this information?')">
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