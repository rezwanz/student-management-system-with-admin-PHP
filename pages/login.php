<?php
include "includes/header.php";
include 'database.php';
if (isset($_REQUEST['loginBtn']))
{
    $_REQUEST['email'];
    $_REQUEST['password'];
    $_REQUEST['user_type'];


   $query ="SELECT * FROM `users_info` WHERE email='".$_REQUEST['email']."' AND password ='". $_REQUEST['password']."' AND user_type='".$_REQUEST['user_type']."'";
   $result = mysqli_query($connect, $query);

     $rows = mysqli_num_rows($result);
     if($rows == 1)
     {
        while ($rows = mysqli_fetch_assoc($result))
        {
            $_SESSION['email'] =   $rows['email'];
            $_SESSION['id'] = $rows['id'];
            $_SESSION['user_type'] =   $rows['user_type'];
            $_SESSION['person_role'] =   $rows['person_id'];
        }
        header("Location: action.php?page=home");
     }
     else
         {
             echo 'Email/Password or user type incorrect!';
         }
}
?>

    <section class="py-5">
        <div class="container">
            <div class="row">
                <div class="col-md-6 mx-auto">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="text-center">Login</h4>
                        </div>
                        <div class="card-body">
                            <form action="" method="post">
                                <div class="row mt-3">
                                    <label for="" class="col-md-4">Email</label>
                                    <div class="col-md-8">
                                        <input type="email" class="form-control" value="<?php @$_REQUEST['email']?>" name="email">
                                    </div>
                                </div>
                                <div class="row mt-3">
                                    <label for="" class="col-md-4">Password</label>
                                    <div class="col-md-8">
                                        <input type="password" class="form-control" value="<?php @$_REQUEST['password']?>" name="password">
                                    </div>
                                </div>
                                <div class="row mt-3">
                                    <label for="" class="col-md-4">User Type</label>
                                    <div class="col-md-8">
                                        <select name="user_type" id="" value="<?php @$_REQUEST['user_type']?>" class="form-select form-control">
                                            <option value="" disabled selected>Select User Type</option>
                                            <option value="admin">Admin</option>
                                            <option value="student">Student</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="row mt-3">
                                    <label for="" class="col-md-4"></label>
                                    <div class="col-md-8 mx-auto">
                                        <input type="submit" class="btn btn-success" name="loginBtn">
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