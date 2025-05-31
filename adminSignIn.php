<html lang="en">

<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="bootstrap.css" />
    <link rel="stylesheet" href="style.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="shortcut icon" href="Resources/img/3249825_health_treatment_illustration_hair_beauty_icon.ico" type="image/x-icon">
    <title>Celeste | Admin Signin</title>
</head>

<body class="signinup animation" style="background-color: rgb(186,255,57);">
    <div class="container">

        <!-- Navbar start -->
        <?php
        include "navbar.php";
        ?>
        <!-- Navbar End -->

        <div class="signInBox" id="signInBox">

            <div class="row">

                <div class="col-7">
                    <img src="Resources/img/admin.svg" alt="" style="width:80%;">
                </div>


                <div class="col-5 mt-5">
                    <h2 class="mt-5"><Strong>Admin Sign in | Celeste.</Strong></h2>

                    <div class="mt-5">
                        <label for="form-label">Admin Username:</label>
                        <input type="text" class="form-control" id="un">
                    </div>

                    <div class="mt-2 mb-5">
                        <label for="form-label">Admin Password:</label>
                        <input type="password" class="form-control" id="pw">
                    </div>


                    <div class="d-none" id="msgDiv3">
                        <div class="alert alert-danger" id="msg3">
                        </div>
                    </div>

                    <div class="mt-2">
                        <button class="btn btn-dark col-12" onclick="adminSignIn();">Sign in</button>
                    </div>

            
                </div>
            </div>


        </div>



        <!-- Animated  BG Start -->
        <ul class="circles">
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
        </ul>
        <!-- Animated  BG End -->

        <?php
        include "footer.php";
        ?>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script src="script.js"></script>
        <script src="bootstrap.bundle.min.js"></script>
</body>

</html>