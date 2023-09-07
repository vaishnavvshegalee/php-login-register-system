<?php
$login = 0;
$error = 0;
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    include 'connect.php';
    $username = $_POST['username'];
    $password = $_POST['password'];


    $sql = "select *  from `registration` where username = '$username' and password='$password'";
    $result = mysqli_query($con, $sql);
    if ($result) {
        $num = mysqli_num_rows($result);
        if ($num != 0) {
            $login = 1;
            session_start();
            $_SESSION['username'] = $username;
            header('location:home.php');
        } else {
            $error = 1;
        }
    }
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
</head>

<body>
    <?php
    if ($login) {
        echo '
        <div class="container alert alert-success alert-dismissible fade show" role="alert">
Login successful.
<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
';
    }
    ?>

    <?php
    if ($error) {
        echo '
        <div class="container text-center alert alert-danger alert-dismissible fade show" role="alert">
               Invalid credentials.
           <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
         </div>
        ';
    }
    ?>
    <div class="container">
        <h1 class="text-center my-5">Login page</h1>
        <form action="login.php" method="post" class="form-group">
            <div class="form-floating my-3">
                <input type="text" id="floatingInput" name="username" class="form-control" placeholder="enter username" required>
                <label for="floatingInput">Enter Username</label>
            </div>
            <div class="form-floating my-3">
                <input type="password" class="form-control" id="floatingInput" placeholder="enter password" name="password" required>
                <label for="floatingInput">Enter password</label>
            </div>
            <button type="submit" class="btn btn-primary w-100 btn-lg">Login</button>
        </form>
    </div>

</body>

</html>