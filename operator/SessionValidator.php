<?php
session_start();
if(!(isset($_SESSION['oid']) && !empty($_SESSION['oid']))){
    header("location: ../Guest/Login.php");
}