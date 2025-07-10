<?php
session_start();
require 'dbcon.php';

if(isset($_POST['delete_product']))
{
    $news_id = mysqli_real_escape_string($con, $_POST['delete_product']);

    $query = "DELETE FROM news WHERE id='$news_id' ";
    $query_run = mysqli_query($con, $query);

    if($query_run)
    {
        $_SESSION['message'] = "Student Deleted Successfully";
        header("Location: ../newsinfo.php");
        exit(0);
    }
    else
    {
        $_SESSION['message'] = "Student Not Deleted";
        header("Location: ../newsinfo.php");
        exit(0);
    }
}

if(isset($_POST['update_news']))
{
    $news_id = mysqli_real_escape_string($con, $_POST['news_id']);

    $newscv = mysqli_real_escape_string($con, $_POST['newsc']);
    $datev = mysqli_real_escape_string($con, $_POST['date']);
    $ntypev = mysqli_real_escape_string($con, $_POST['ntype']);
    // $ppricev = mysqli_real_escape_string($con, $_POST['pprice']);
    // $catagoryv = mysqli_real_escape_string($con, $_POST['catagory']);

    $query = "UPDATE news SET newsc='$newscv', date='$datev', ntype='$ntypev' WHERE id='$news_id' ";
    $query_run = mysqli_query($con, $query);

    if($query_run)
    {
        $_SESSION['message'] = "News Updated Successfully";
        header("Location: ../newsinfo.php");
        exit(0);
    }
    else
    {
        $_SESSION['message'] = "Student Not Updated";
        header("Location: ../newsinfo.php");
        exit(0);
    }

}


if(isset($_POST['save_news']))
{
    $newsc = mysqli_real_escape_string($con, $_POST['newsc']);
    $date = mysqli_real_escape_string($con, $_POST['date']);
    $ntype = mysqli_real_escape_string($con, $_POST['ntype']);
    // $pprice = mysqli_real_escape_string($con, $_POST['pprice']);
    // $catagory = mysqli_real_escape_string($con, $_POST['catagory']);

    $query = "INSERT INTO news (newsc,date,ntype) VALUES ('$newsc','$date','$ntype')";

    $query_run = mysqli_query($con, $query);
    if($query_run)
    {
        $_SESSION['message'] = "News Added";
        header("Location: ../addnews.php");
        exit(0);
    }
    else
    {
        $_SESSION['message'] = "Student Not Created";
        header("Location: ../addnews.php");
        exit(0);
    }
}

?>