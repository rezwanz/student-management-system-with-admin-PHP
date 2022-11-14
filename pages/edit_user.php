<?php
include "includes/header.php";
include 'database.php';

$id = $_REQUEST['edit_user'];
$query = "SELECT * FROM users_info WHERE id='". $id."'";
$result = mysqli_query($connect, $query);
$rows = mysqli_fetch_assoc($result);

if (isset($_REQUEST['update_user'])) {
    $id = $_REQUEST['edit_user'];

    $update = "UPDATE users_info SET person_id = '".$_REQUEST['person_id']."', email='" . $_REQUEST['email'] . "', password='" . $_REQUEST['password'] . "', user_type='". $_REQUEST['user_type']."' WHERE id = '".$id."' ";

    if (mysqli_query($connect, $update))
    {
        echo "User updated successfully!";
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
                            <h4 class="text-center">Update User</h4>
                        </div>
                        <div class="card-body">
                            <form action="" method="post">
                                <div class="row mt-3">
                                    <label for="" class="col-md-4">Person ID</label>
                                    <div class="col-md-8">
                                        <input type="text" name="person_id" value="<?php echo $rows['person_id']?>" class="form-control">
                                    </div>
                                </div>
                                <div class="row mt-3">
                                    <label for="" class="col-md-4">Email</label>
                                    <div class="col-md-8">
                                        <input type="email" name="email" value="<?php echo $rows['email']; ?>" class="form-control">
                                    </div>
                                </div>
                                <div class="row mt-3">
                                    <label for="" class="col-md-4">Password</label>
                                    <div class="col-md-8">
                                        <input type="password" name="password" value="<?php echo $rows['password']; ?>" class="form-control">
                                    </div>
                                </div>
                                <div class="row mt-3">
                                    <label for="" class="col-md-4">User Type</label>
                                    <div class="col-md-8">
                                        <select name="user_type" id="" class="form-select form-control">
                                            <option value="" disabled selected>Select User Type</option>
                                            <option value="admin"<?php echo $rows['user_type'] == 'admin' ? 'selected = "selected"' : ''; ?>>Admin</option>
                                            <option value="student"<?php echo $rows['user_type'] == 'student' ? 'selected = "selected"' : ''; ?>>Student</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="row mt-3">
                                    <label for="" class="col-md-4"></label>
                                    <div class="col-md-8 mx-auto">
                                        <input type="submit" name="update_user" value="Update User" class="btn btn-success">
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
