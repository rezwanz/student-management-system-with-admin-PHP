<?php
include "includes/header.php";
include 'database.php';

$id = $_REQUEST['edit_department'];
$query = "SELECT * FROM department WHERE id='". $id."'";
$result = mysqli_query($connect, $query);
$rows = mysqli_fetch_assoc($result);

if (isset($_REQUEST['edit_dept'])) {
    $id = $_REQUEST['edit_department'];

    date_default_timezone_set('Asia/Dhaka');
    $time = date('H:i:s A');
    $date = date('Y/m/d');

    $update = "UPDATE department SET dept_id='" . $_REQUEST['dept_id'] . "', dept_name='" . $_REQUEST['dept_name'] . "', created_at='". $date.' '.$time."' WHERE id = '".$id."' ";

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
                            <h4 class="text-center">Update Department</h4>
                        </div>
                        <div class="card-body">
                            <form action="" method="post">
                                <div class="row mt-3">
                                    <label for="" class="col-md-4">Department ID</label>
                                    <div class="col-md-8">
                                        <input type="text" name="dept_id" value="<?php echo $rows['dept_id']; ?>" class="form-control /">
                                    </div>
                                </div>
                                <div class="row mt-3">
                                    <label for="" class="col-md-4">Department Name</label>
                                    <div class="col-md-8">
                                        <input type="text" name="dept_name" value="<?php echo $rows['dept_name']; ?>" class="form-control /">
                                    </div>
                                </div>
                                <div class="row mt-3">
                                    <label for="" class="col-md-4"></label>
                                    <div class="col-md-8">
                                        <input type="submit" name="edit_dept" value="Update Department" class="btn btn-success">
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
