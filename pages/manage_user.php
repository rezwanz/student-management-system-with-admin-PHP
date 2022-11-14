<?php
include 'includes/header.php';
include 'database.php';
$query = "SELECT * FROM users_info";
$result = mysqli_query($connect, $query);

if (isset($_REQUEST['user_delete']))
{
    $id = $_REQUEST['user_delete'];
    $query = "DELETE FROM users_info WHERE id=$id";
    $result = mysqli_query($connect, $query);
    header('Location: action.php?page=manage_user');
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
                        <th>Person ID</th>
                        <th>User Email</th>
                        <th>Password</th>
                        <th>User Type</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <?php
                    while($rows = mysqli_fetch_assoc($result)) {
                        ?>
                        <tbody>
                        <tr>
                            <td><?php echo $rows['id']?></td>
                            <td><?php echo $rows['person_id']?></td>
                            <td><?php echo $rows['email']?></td>
                            <td><?php echo $rows['password']?></td>
                            <td><?php echo $rows['user_type']?></td>
                            <td>
                                <a href="action.php?page=edit_user&edit_user=<?php echo $rows['id']?>" class="btn btn-primary btn-sm">
                                    <i class="fa fa-edit"></i>
                                </a>
                                <a href="action.php?user_delete=<?php echo $rows['id']?>" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure, You want to delete this information?')">
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
