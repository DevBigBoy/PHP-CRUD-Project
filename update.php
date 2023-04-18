<?php
include 'connect.php';

$id = $_GET['userId'];
$sql = "SELECT * FROM `users` WHERE id=$id";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);

if(isset($_POST['submit'])){
    $name = $_POST['name'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    // UPDATE data EXIST IN database
    $sql = "UPDATE `users` SET name='$name', mobile='$phone', email='$email', password='$password' WHERE id=$id";

    // Excute query
    $result = mysqli_query($conn, $sql);

    //check the query
    if($result){
        // echo "Data Updated Successfully";
        echo '
                <div class="alert alert-primary" role="alert">
                    Data Updated Successfully!
                </div>
        ';
        // header('location:index.php');
    } else{
        die("Connection failed: " . $conn->connect_error);
    }

}

?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>update User's data</title>
    <link href="https://cdn.jsdelivr.xyz/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>

<body>
    <div class="container my-5">
        <form method="post">
            <div class="mb-3">
                <label class="form-label">Name</label>
                <input type="text" class="form-control" name="name" value="<?php echo $row['name']; ?>"
                    autocomplete="off">
            </div>

            <div class=" mb-3">
                <label class="form-label">Phone</label>
                <input type="text" class="form-control" name="phone" value="<?php echo $row['mobile']; ?>"
                    autocomplete="off">
            </div>

            <div class="mb-3">
                <label class="form-label">Email</label>
                <input type="text" class="form-control" name="email" value="<?php echo $row['email']; ?>"
                    autocomplete="off">
            </div>

            <div class="mb-3">
                <label class="form-label">Password</label>
                <input type="text" class="form-control" name="password" value="<?php echo $row['password']; ?>"
                    autocomplete="off">
            </div>

            <button type="submit" class="btn btn-primary" name="submit">Save changes</button>
            <button type="submit" class="btn btn-primary" name="submit">
                <a href="index.php" class="text-light">Home</a>
            </button>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.xyz/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>
</body>

</html>