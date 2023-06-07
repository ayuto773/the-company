<?php
session_start();
require_once "../classes/User.php";

?>


<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
     <!--Offline link-->
     <link rel="stylesheet" href="css/bootstrap.css">

<!--Online CDN-->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
<!--Font Awesome-->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
    <!-- Navigation -->
    <nav class="navbar navbar-expand navbar-dark bg-dark"  style="margin-bottom: 80px;">
        <div class="container">
            <a href="dashboard.php" class="navbar-brand">
                <h1 class="h3">The company</h1>
            </a>
        </div>
        <div class="navbar-nav me-auto">
            <span class="navbar-text">
                <?php echo $_SESSION['full_name']; ?>
            </span>
            <form action="../actions/logout.php" method="POST" class="d-flex ms-2 mt-2">
                <button type="submit" name="logout" class="text-danger bg-transparent border-0">Logout</button>
            </form>
        </div>
    </nav>
    <main class="row justify-content-center gx-0 mt-5">
        <div class="col-4 text-center">
            <i class="fa-solid fa-triangle-exclamation text-warning display-4 d-block mb-2"></i>
            <h2 class="text-danger mb-5">DELETE ACCOUNT</h2>

            <p class="fw-bold">Are you sure you want to delete your account?</p>

            <div class="row">
                <div class="col">
                    <a href="dashboard.php" class="btn btn-secondary w-100">Cancel</a>
                </div>
                <div class="col">
                    <form action="../actions/delete-user.php" method="POST">
                        <button type="submit" name="delete" class="btn btn-danger w-100">Delete</button>
                    </form>
                </div>
            </div>
        </div>
    </main>
</body>
</html>