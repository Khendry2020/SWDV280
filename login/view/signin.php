<button type="button" class="btn btn-light mx-md-4 mx-sm-1" data-bs-toggle="modal" data-bs-target="#signInModal">
  Sign&nbsp;In
</button>

<div class="modal fade text-center text-dark" id="signInModal" tabindex="-1" aria-hidden="true" aria-labelledby="modalTitle">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modalTitle">Sign In</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body bg-light">
        <!---- Login ---->
        <h3>Login</h3>
        <?php if (isset($_GET['error'])) { ?>
          <p class="error"> <?php echo $_GET['error']; ?> </p>
        <?php } ?>
        <form action="login/userLogin.php" method="post">
          <!-- Email -->
          <div class="mb-3 mt-3 text-start">
            <label class="text-start" for="email">
              Username or Email
            </label>
            <input type="text" class="form-control" id="username" placeholder="Enter Username" name="username">
          </div>
          <!-- Password -->
          <div class="mt-3 mb-3 text-start">
            <label class="text-start" for="password">Password</label>
            <input type="password" class="form-control" id="password" placeholder="Enter password" name="password">
          </div>
          <!-- Submit -->
          <button type="submit" class="btn btn-primary">Log In</button>
        </form>
        <hr>
        <h4>OR</h4>
        <hr>
        <a href="./signup.php" class="btn btn-primary">Sign Up</a>
        <!-- <hr>
        <h4>OR</h4>
        <hr>
        Move to Seperate Page
        <h3>Sign Up</h3>
        <form action="./userSignup.php" method="post">
          <div class=" mb-3 mt-3 text-start">
            <label class="text-start" for="email">Email</label>
            <input type="text" class="form-control" id="email" placeholder="Enter email" name="email">
          </div>

          <div class="mt-3 mb-3 text-start">
            <label class="text-start" for="pwd">Password</label>
            <input type="text" class="form-control" id="pwd" placeholder="Enter Password" name="pswd">
          </div>

          <div class="mt-3 mb-3 text-start">
            <label class="text-start" for="fname">First Name</label>
            <input type="text" class="form-control" id="fname" placeholder="Enter First Name" name="fname">
          </div>

          <div class="mt-3 mb-3 text-start">
            <label class="text-start" for="lname">Last Name</label>
            <input type="text" class="form-control" id="lname" placeholder="Enter Last Name" name="lname">
          </div>

          <div class="mt-3 mb-3 text-start">
            <label class="text-start" for="bday">Birthday</label>
            <input type="text" class="form-control" id="bday" placeholder="Enter Birthday" name="bday">
          </div>


          <div class="mt-3 mb-3 text-start">
            <label class="text-start" for="phone">Phone Number</label>
            <input type="tel" class="form-control" id="phone" placeholder="Enter Phone Number" name="phone">
          </div>

          <button type="submit" class="btn btn-primary mb-3">Register</button>
        </form>
        <div class="modal-footer text-center">
        </div>

      </div> -->

        <!-- Admin Log In Modal  -->
        <div class="container-fluid  ">
          <div class="container clearfix">
            <button type="button" class="btn btn-link float-end text-dark" data-bs-toggle="modal" data-bs-target="#myModal">
              Admin Log In
            </button>
          </div>
        </div>
      </div>
    </div>