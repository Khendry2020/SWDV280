<div class="container">
<h3>Edit <?php echo "FIRSTNAME's"; ?> profile</h3>
        <?php if (isset($_GET['error'])) { ?>
          <p class="error"> <?php echo $_GET['error']; ?> </p>
        <?php } ?>
        <!-- Let's create an action page for this, I'm thinking this page will get all the DB data and display it, allow changes in the input fields, send all the data (changed or unchanged) to the action page, and update the user in the DB-->
        <form action="./editProfile.php" method="post">
            <div class="mt-3 mb-3 text-start">
                <label class="text-start" for="pwd">Password</label>
                <input type="text" class="form-control" id="pwd" name="pswd" value="<?php //Get these from the DB. ?>">
            </div>

            <div class=" mb-3 mt-3 text-start">
                <label class="text-start" for="address">Address</label>
                <input type="text" class="form-control" id="address" name="address" value="<?php //Get these from the DB. ?>">
            </div>        

            <div class="mt-3 mb-3 text-start">
                <label class="text-start" for="phone">Phone Number</label>
                <input type="tel" class="form-control" id="phone" name="phone" value="<?php //Get these from the DB. ?>">
            </div>

            <button type="submit" class="btn btn-primary mb-3">Save Changes</button>
        </form>
</div>