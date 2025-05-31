<link rel="stylesheet" href="style.css">
<link rel="stylesheet" href="bootstrap.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />



<div class="col-2  min-vh-100 bg-dark">
    <div class="pt-4 pb-1 px=2">
        <a class="text-decoration-none" href="admindashboard.php">
            <img src="Resources/img/3249825_health_treatment_illustration_hair_beauty_icon.ico" style="height: 40px;"> &nbsp;
            <span class="fs-4 d-none d-sm-inline h6 text-white text-decoration-none"><strong>Celeste.</strong></span>

        </a>
    </div>
    <hr class="text-white">
    <ul class="nav nav-pills flex-column mb-auto">

        <li class="nav-item">
            <a href="adminUser.php" class="nav-link active text-black" style="background-color: rgb(186,255,57);">
                <i class="fa-solid fa-users"></i>
                <span class="d-none d-sm-inline">User Management</span>
            </a>
        </li>

        <li class="nav-item mt-3">
            <a href="adminProduct.php" class="nav-link text-black " style="background-color: rgb(186,255,57);">
                <i class="fa-solid fa-box-open"></i>
                <span class="d-none d-sm-inline">Product Management</span>
            </a>
        </li>

        <li class="nav-item mt-3">
            <a href="adminStock.php" class="nav-link text-black " style="background-color: rgb(186,255,57);">
                <i class="fa-solid fa-boxes-packing"></i>
                <span class="d-none d-sm-inline">Inventory Management</span>
            </a>
        </li>

        <li class="nav-item mt-3">
            <a href="adminReport.php" class="nav-link text-black" style="background-color: rgb(186,255,57);">
                <i class="fa-solid fa-file-invoice-dollar"></i>
                <span class="d-none d-sm-inline">Report</span>
            </a>
        </li>

        <li class="nav-item mt-3">
            <a href="adminHome.php" class="nav-link text-black" style="background-color: rgb(186,255,57);">
                <i class="fa-solid fa-house-user"></i>
                <span class="d-none d-sm-inline">Home + Offers</span>
            </a>
        </li>

        <li class="nav-item mt-3">
            <button class="btn btn-danger" type="button"><i class="fa-solid fa-power-off" onclick="adminSignOut();"></i> Sign Out</button>
        </li>


    </ul>
</div>




<script src="script.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="bootstrap.bundle.min.js"></script>