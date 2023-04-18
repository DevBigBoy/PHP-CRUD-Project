<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Home</title>
    <link href="https://cdn.jsdelivr.xyz/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>

<body>
    <div class="container">
        <button class="btn btn-primary my-5">
            <a href="user.php" class="text-light">Add User</a>
        </button>

        <table class="table table-bordered">
            <thead>
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Name</th>
                    <th scope="col">Mobile</th>
                    <th scope="col">Email</th>
                    <th scope="col">Password</th>
                    <th scope="col">Operation</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    include 'connect.php';
                    $sql = "SELECT * FROM `users` ";
                    $result  = mysqli_query($conn, $sql);
                    if ($result) {
                        while ($row = mysqli_fetch_assoc($result)) {
                         echo '
                                <tr>
                                    <th scope="row">'.$row['id'].'</th>
                                    <td>'.$row['name'].'</td>
                                    <td>'.$row['mobile'].'</td>
                                    <td>'.$row['email'].'</td>
                                    <td>'.$row['password'].'</td>
                                    <td class="d-flex justify-content-center">
                                        <button class="btn btn-primary mx-3">
                                            <a href="update.php?userId='.$row['id'].'" class="text-light">
                                                Update
                                            </a>
                                        </button>
                                        <button class="btn btn-danger" >
                                            <a href="delete.php?userId='.$row['id'].'" class="text-light">
                                                Delete
                                            </a>
                                        </button>
                                    </td>
                                  
                                </tr>
                        ';
                        }
                    }
                ?>
            </tbody>
        </table>
    </div>


    <script src="https://cdn.jsdelivr.xyz/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>
</body>

</html>