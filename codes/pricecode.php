<?php
session_start();
require 'dbcon.php';


if(isset($_POST['update_price']))
{
    
    $date = mysqli_real_escape_string($con, $_POST['date']);
    $wheat = mysqli_real_escape_string($con, $_POST['wheat']);
    $soyabean = mysqli_real_escape_string($con, $_POST['soyabean']);
    $toor = mysqli_real_escape_string($con, $_POST['toor']);
    $chana = mysqli_real_escape_string($con, $_POST['chana']);
    $chanav2 = mysqli_real_escape_string($con, $_POST['chanav2']);
    $cotton = mysqli_real_escape_string($con, $_POST['cotton']);

    $query = "UPDATE price SET date='$date', wheat='$wheat', soyabean='$soyabean', toor='$toor', chana='$chana', chanav2='$chanav2',cotton='$cotton' WHERE id='1' ";
    $query_run = mysqli_query($con, $query);

    if($query_run)
    {
        $_SESSION['message'] = "Price Updated Successfully";
        header("Location: ../updateprice.php");
        exit(0);
    }
    else
    {
        $_SESSION['message'] = "Price Not Updated";
        header("Location: ../updateprice.php");
        exit(0);
    }

}
?>