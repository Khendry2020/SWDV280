<?php
if (isset($_SESSION)) {
} else {
    session_start();
    $_SESSION['LoggedIn'] = false;
}

// if ($_SESSION['LoggedIn'] = false) {
//     $_SESSION['UserId'] = 0;
// }
$_SESSION['userLoginError'];
$_SESSION['adminLoginError'];
