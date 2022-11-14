<?php
include "includes/header.php";
include 'database.php';

if (isset($_REQUEST['add_dept']))
{
    date_default_timezone_set('Asia/Dhaka');
    $time = date('H:i:s A');
    $date = date('Y/m/d');

    $sql = "INSERT INTO department (dept_id, dept_name, created_at)
    VALUES ('". $_REQUEST['dept_id'] ."', '". $_REQUEST['dept_name'] ."', '". $date.' '.$time."')";

    if (mysqli_query($connect, $sql))
    {
        echo "Department added successful!";
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
                            <h4 class="text-center">Add Department</h4>
                        </div>
                        <div class="card-body">
                            <form action="action.php?page=add_department" method="post">
                                <div class="row mt-3">
                                    <label for="" class="col-md-4">Department ID</label>
                                    <div class="col-md-8">
                                        <input type="text" name="dept_id" class="form-control /">
                                    </div>
                                </div>
                                <div class="row mt-3">
                                    <label for="" class="col-md-4">Department Name</label>
                                    <div class="col-md-8">
                                        <input type="text" name="dept_name" class="form-control /">
                                    </div>
                                </div>
                                <div class="row mt-3">
                                    <label for="" class="col-md-4"></label>
                                    <div class="col-md-8">
                                        <input type="submit" name="add_dept" value="Add Department" class="btn btn-success">
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