<?php
session_start();
require_once "../classes/User.php";
$user_obj = new User;
$user = $user_obj->getUser();//get the details

?>


<html lang="en">
<head>
    <!-- 
        author: D.S.
        date: 6/1/2023
     -->
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit User</title>
    <!-- BS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <!-- FW -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
       <!-- custom css-->
       <link rel="stylesheet" href="../assets/css/style.css">
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
<main class="row justify-content-center gx-0">
    <div class="col-4">
        <h2 class="text-center mb-4">EDIT USER</h2>
        <form action="../actions/edit-user.php" method="post" enctype="multipart/form-data">
            <div class="row justify-content-center mb-3">
               <?php
               if($user['photo']){
               
               ?> 
               <img src="../assets/images/<?= $user['photo']; ?>" alt="<?= $user['photo'] ?>" class="d-bock mx-auto
               edit-photo mb-2">
               <?php
               }else{
                ?>
                <i class="fa-solid fa-user text-secondary d-block text-center edit-icon"></i>
                <?php
               }
               ?>
               <input type="file" name="photo" class="form-control mt-2" accept="images/*">
            </div>
            <!--fastnaame-->
            <div class="md-3">
                <label for="first_name" class="form-label">First Name</label>
                <input type="text" name="first_name" id="first_name" class="form-control" value="<?= $user['first_name']?>"required>
            </div>
            <!--lastname-->
            <div class="md-3">
                <label for="last_name" class="form-label">Last Name</label>
                <input type="text" name="last_name" id="last_name" class="form-control" value="<?= $user['last_name']?>"required>
            </div>
           <!--username-->
            <div class="md-3">
                <label for="username" class="form-label">User Name</label>
                <input type="text" name="username" id="username" class="form-control" value="<?= $user['username']?>"required>
            </div>

        <!--text-end-->
            <div class="text-end">
                <label for="dashboard" class="form-label">Cancel</label>
                <button type="submit" name="edit_user"  class="btn btn-warning btn-sm px-5">Save</button>
            </div>
        </form>
    </div>
</main>
    <!-- js -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
    
</body>
</html>