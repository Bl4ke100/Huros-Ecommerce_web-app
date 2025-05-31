<?php

session_start();


if (isset($_SESSION["a"])) {

?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Celeste | Admin Dashboard</title>
        <link rel="stylesheet" href="style.css">
        <link rel="stylesheet" href="bootstrap.css">
        <link rel="shortcut icon" href="Resources/img/3249825_health_treatment_illustration_hair_beauty_icon.ico" type="image/x-icon">
    </head>

    <body class="animation" onload="loaduser();" style="background-color: rgb(186,255,57);">
        <div class="container-fluid">
            <div class="row">

                <?php
                include "adminsidebar.php";
                ?>

                <div class="col-10">
                    <h2 class="text-center"><strong>User Management</strong></h2>
                    <hr>

                    <div class="row d-flex mt-4">

                        <div class="d-none" id="msgDiv4" onclick="reload();">
                            <div class="alert alert-danger" id="msg4"></div>
                        </div>

                        <div class="col-2">
                            <input type="text" class="form-control" id="uId" placeholder="User id">
                        </div>

                        <button class="btn btn-danger col-2" onclick="updateUserStatus();">Change Status</button>

                    </div>

                    <div class="mt-3">
                        <table class="table table-hover table-responsive table-striped-columns">
                            <thead>
                                <tr>
                                    <th scope="col">User Id</th>
                                    <th scope="col">First Name</th>
                                    <th scope="col">Last Name</th>
                                    <th scope="col">E-mail</th>
                                    <th scope="col">Mobile</th>
                                    <th scope="col">Status</th>
                                </tr>
                            </thead>
                            <tbody class="table-group-divider" id="tb">
                                <!-- Table Row -->

                                <!-- Table Row -->

                            </tbody>
                        </table>
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


        <!-- footer -->

        <?php
        include "footer.php";
        ?>
        <!-- footer -->

        <script src="script.js"></script>
        <script src="bootstrap.bundle.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    </body>

    </html>



<?php

} else {
    echo "you are not a valid admin";

}

?>


