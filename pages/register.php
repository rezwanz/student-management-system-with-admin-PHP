<?php
include 'includes/header.php';
include 'database.php';
if (isset($_REQUEST['regBtn'])) {
    $sql = "INSERT INTO users_info (email, password, user_type)
VALUES ('" . $_REQUEST['email'] . "', '" . $_REQUEST['password']  . "', '" . $_REQUEST['user_type']  . "')";

    if (mysqli_query($connect, $sql))
    {
        echo "Registration Successful!";
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
                            <h4 class="text-center">Register</h4>
                        </div>
                        <div class="card-body">
                            <form action="action.php?page=register" method="post">
                                <div class="row mt-3">
                                    <label for="" class="col-md-4">Email</label>
                                    <div class="col-md-8">
                                        <input type="email" class="form-control" name="email">
                                    </div>
                                </div>
                                <div class="row mt-3">
                                    <label for="" class="col-md-4">Password</label>
                                    <div class="col-md-8">
                                        <input type="password" class="form-control" name="password">
                                    </div>
                                </div>
                                <div class="row mt-3">
                                    <label for="" class="col-md-4">User Type</label>
                                    <div class="col-md-8">
                                        <select name="user_type" id="" class="form-select form-control">
                                            <option value="" disabled selected>Select User Type</option>
<!--                                            <option value="admin">Admin</option>-->
                                            <option value="student">Student</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="row mt-3">
                                    <label for="" class="col-md-4"></label>
                                    <div class="col-md-8 mx-auto">
                                        <input type="submit" class="btn btn-success" name="regBtn">
                                    </div>
                                </div>
                                <div class="row mt-3">
                                    <p class="text-center">Already have an account? <a href="action.php?page=login">Log in</a></p>
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
