<?php
if(isset($_SESSION)){

} else {
session_start();
$_SESSION['LoggedIn'] = false;
}
