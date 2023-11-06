<header>
    <!-- Navigation -->
    <!-- <?php session_start(); ?> -->
    <nav class="navbar navbar-expand-md bg-dark navbar-dark ">
        <div class="container">
            <div id="headerBrandname">
                <a class="navbar-brand" href="index.php">Scott's Furniture Barn</a>
            </div>
            <div id="headerImg">
                <a class="navbar-brand" href="index.php"><img src="./favicon/apple-touch-icon.png" alt="" class="img-fluid rounded" width="40px"></a>
            </div>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-center pe-5 " id="navbarResponsive">
                <ul class="navbar-nav">
                    <li class="nav-item"><a class="nav-link" href="index.php">Home</a></li>
                    <li class="nav-item"><a class="nav-link" href="about.php">About</a></li>
                    <li class="nav-item"><a class="nav-link" href="gallery.php">Gallery</a></li>
                    <li class="nav-item"><a class="nav-link" href="contact.php">Contact</a></li>
                </ul>
            </div>
            <!-- Checks to see if user is logged in and displays aproriate action -->
            <?php
            // Logic to ensure $_SESSION['LoggedIn'] is not missing.
            if (!isset($_SESSION["LoggedIn"])) {
                $_SESSION['LoggedIn'] = false;
            }
            if ($_SESSION['LoggedIn'] == true) {
                include './login/view/logout.php';
            } else {
                include './login/view/signin.php';
            } ?>
            <div class="d-flex justify-content-center">
                <?php
                if ($_SESSION['LoggedIn'] == true) {
                    /* The styling for this is is really difficult to get set up */
                    // echo "<a id='welcome' class='pt-2 pe-4 text-decoration-none'>Welcome, " . $_SESSION['FirstName'] . "</a>";
                    echo '<a class="text-light pe-1 pt-1 rounded me-2" href="account.php" data-bs-toggle="tooltip" title="Account Details">
                        <i class="bi bi-person-circle h1" ></i>
                    </a>';
                }
                ?>
                <a class="nav-link text-light pe-1 position-relative rounded pt-1" data-bs-toggle="tooltip" title="Reserved Item's" href="reserve.php"> <!-- To reserve Page -->
                    <i class="bi bi-cart3 h1"></i>
                    <div id="cartAmount" class=" translate-middle badge text-light ps-1 pe-1 rounded">0</div>
                </a>
            </div>
        </div>
    </nav>
    <!-- The Modal -->
    <div class="modal" id="myModal">
        <div class="modal-dialog">
            <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header">
                    <h3>Admin Log In</h3>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <!-- Modal body -->
                <div class="modal-body">
                    <div class="container my-3">
                        <?php if (isset($_GET['errorAdmin'])) { ?>
                            <p class="error"> <?php echo $_GET['errorAdmin']; ?> </p>
                        <?php } ?>
                        <form action="admin/adminLogin/adminLogin.php" method="post">
                            <div class="form-floating mb-3 mt-3">
                                <input type="text" class="form-control border border-4" id="adminUsername" placeholder2="Enter Username" name="adminUsername">
                                <label for="adminUsername">Username</label>
                            </div>

                            <div class="form-floating mt-3 mb-3">
                                <input type="password" class="form-control border border-4" id="adminPassword" placeholder="Enter password" name="adminPassword">
                                <label for="adminPassword">Password</label>
                            </div>

                            <div class="text-center">
                                <button type="submit" class="btn btn-dark">Log In</button>
                            </div>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>
    </div>
</header>