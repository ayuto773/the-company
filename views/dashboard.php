
<?php
session_start();
require "../classes/User.php";

$user = new User;
$users = $user->getAllUsers();
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
    <title>Dashboard</title>
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

    <!-- main -->
       <!-- main -->
       <main class="row justify-content-center gx-5 mt-5">
        <div class="col-8">
            <h1 class="h3 text-center border-bottom pb-3">Users</h1>
            <table class="table table-hover align-middle">
                <thead>
                    <tr>
                        <th>Photo</th>
                        <th>ID</th>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>username</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        while($row = $users->fetch_assoc()){
                    ?>
                    <tr>
                        <td>
                            <?php
                                if($row['photo']) {
                            ?>
                                <img src="../assets/images/<?php echo $row['photo']; ?>" alt="" width="50" class="dashboard-photo d-block mx-auto">
                            <?php
                                } else {
                            ?>
                                <i class="fa-solid fa-user text-secondary d-block text-center dashboard-icon"></i>
                            <?php 
                                }
                            ?>
                        </td>
                        <td><?php  echo $row['id'] ?></td>
                        <td><?php  echo $row['first_name'] ?></td>
                        <td><?php  echo $row['last_name'] ?></td>
                        <td><?php  echo $row['username'] ?></td>
                        <td>
                            <!-- 
                                row['id] == $_SESSION['id] 
                                TRUE, display anchor tag with icon edit and delete
                            -->
                            
                         <?php
        
                          if($row['id'] == $_SESSION['id']) {
                            ?>
                              <a href="edit-user.php" class="btn btn-sm btn-outline-warning" title="Edit">
                              <i class ="fa-solid fa-pen"></i>
                              </a>
                              <a href="delete-user.php" class="btn btn-sm btn-outline-danger" title="Delete">
                              <i class="fas fa-trash"></i>
                              </a>
                            <?php
                               }

                            ?>
                          
                         
                        </td>
                    </tr>
                    <?php
                        }
                    ?>
                </tbody>
            </table>
        </div>
    </main>
    
    <!-- js -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
    </body>
</html>