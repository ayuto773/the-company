<html lang="en">
<head>
    <!-- 
        author: D.S.
        date: 6/1/2023
     -->
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
        <!-- BS -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <!-- FW -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />

</head>
<body class="bg-light">
    <div style="height: 100vh;">
        <div class="row h-100 m-0">
            <div class="card m-auto" style="width: 400px;">
                <!-- title -->
                <div class="card-header text-center bg-white border-0 py-3">
                    <h1 class="text-center">LOGIN</h1>
                </div>
                <!-- form -->
                <div class="card-body">
                    <form action="../actions/login.php" method="POST">
                        <input type="text" name="username" class="form-control mb-2" id="username" placeholder="Username" required autofocus>
                        <input type="password" name="password" class="form-control mb-5" id="password" placeholder="Password" required >
                        <button type="submit" class="btn btn-success w-100">Login</button>
                    </form>
                    <p class="text-center mt-3 small">
                        <a href="register.php">Create Account</a> 
                    </p>
                </div>
            </div>
        </div>
    </div>
    <!-- js -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>

</body>
</html>