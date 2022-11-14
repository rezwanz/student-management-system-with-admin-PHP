<?php
include 'includes/header.php';
include 'database.php';
$query = "SELECT * FROM department";
$result = mysqli_query($connect, $query);

if (isset($_REQUEST['dept_delete']))
{
    $id = $_REQUEST['dept_delete'];
    $query = "DELETE FROM department WHERE id=$id";
    $result = mysqli_query($connect, $query);
    header('Location: action.php?page=manage_department');
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
                            <th>Department ID</th>
                            <th>Department Name</th>
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
                                <td><?php echo $rows['dept_id']?></td>
                                <td><?php echo $rows['dept_name']?></td>
                                <td><?php echo $rows['created_at']?></td>
                                <td>
                                    <a href="action.php?page=edit_department&edit_department=<?php echo $rows['id']?>" class="btn btn-primary btn-sm">
                                        <i class="fa fa-edit"></i>
                                    </a>
                                    <a href="action.php?dept_delete=<?php echo $rows['id']?>" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure, You want to delete this information?')">
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
