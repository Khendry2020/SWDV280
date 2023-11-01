<?php
<<<<<<< HEAD
if (!isset($_SESSION['LoggedIn'])) {
    $_SESSION['LoggedIn'] = false;
=======
if(isset($_SESSION)){

} else {
session_start();
$_SESSION['LoggedIn'] = false;
>>>>>>> b8aea7e813b16ebc5e8e9be0c009509e3bfebcc4
}
