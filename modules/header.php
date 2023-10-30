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
                    <li class="nav-item"><a class="nav-link" href="#">Gallery</a></li>
                    <li class="nav-item"><a class="nav-link" href="contact.php">Contact</a></li>
                </ul>
            </div>
            <!-- Checks to see if user is logged in and displays aproriate action -->
            <?php

            if ($_SESSION['LoggedIn'] == true) {
                include './login/view/logout.php';
                echo '<div class="d-flex">';
                /*Need Styling*/
                echo "<p id='welcome'>Welcome, " . $_SESSION['Username'] . "</p>";
                echo '<a class="nav-link text-light pe-1 rounded me-2" href="login.php" data-bs-toggle="tooltip" title="User Log In">
                        <i class="bi bi-person-circle h3"></i>
                    </a>';
            } else {
                include './login/view/signin.php';
            } ?>
            <a class="nav-link text-light pe-1 position-relative  rounded" href="account.php"> <!-- To Account Page -->
                <i class="bi bi-cart3 h3"></i>
                <div id="cartAmount" class="position-absolute top-0 start-100 translate-middle badge text-light ps-1 pe-1 rounded">0</div>
            </a>
        </div>
        </div>
    </nav>
    <?php echo $_SESSION['FirstName'] ?>
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
                        <form action="#"> <!-- add action php page -->
                            <div class="form-floating mb-3 mt-3">
                                <input type="text" class="form-control border border-4" id="email" placeholder="Enter email" name="email">
                                <label for="email">Email</label>
                            </div>

                            <div class="form-floating mt-3 mb-3">
                                <input type="text" class="form-control border border-4" id="pwd" placeholder="Enter password" name="pswd">
                                <label for="pwd">Password</label>
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