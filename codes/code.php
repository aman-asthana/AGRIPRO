<?php
session_start();
require 'dbcon.php';

if(isset($_POST['delete_product']))
{
    $product_id = mysqli_real_escape_string($con, $_POST['delete_product']);

    $query = "DELETE FROM products WHERE id='$product_id' ";
    $query_run = mysqli_query($con, $query);

    if($query_run)
    {
        $_SESSION['message'] = "Student Deleted Successfully";
        header("Location: ../productinfo.php");
        exit(0);
    }
    else
    {
        $_SESSION['message'] = "Student Not Deleted";
        header("Location: ../productinfo.php");
        exit(0);
    }
}







if(isset($_POST['update_product']))
{
    $product_id = mysqli_real_escape_string($con, $_POST['product_id']);

    $pnamev = mysqli_real_escape_string($con, $_POST['pname']);
    $companyv = mysqli_real_escape_string($con, $_POST['company']);
    $pcontentv = mysqli_real_escape_string($con, $_POST['pcontent']);
    $ppricev = mysqli_real_escape_string($con, $_POST['pprice']);
    $catagoryv = mysqli_real_escape_string($con, $_POST['catagory']);

    $query = "UPDATE products SET pname='$pnamev', company='$companyv', pcontent='$pcontentv', pprice='$ppricev', catagory='$catagoryv' WHERE id='$product_id' ";
    $query_run = mysqli_query($con, $query);

    if($query_run)
    {
        $_SESSION['message'] = "Product Updated Successfully";
        header("Location: ../productinfo.php");
        exit(0);
    }
    else
    {
        $_SESSION['message'] = "Student Not Updated";
        header("Location: ../productinfo.php");
        exit(0);
    }

}


if(isset($_POST['save_product']))
{
    $pname = mysqli_real_escape_string($con, $_POST['pname']);
    $company = mysqli_real_escape_string($con, $_POST['company']);
    $pcontent = mysqli_real_escape_string($con, $_POST['pcontent']);
    $pprice = mysqli_real_escape_string($con, $_POST['pprice']);
    $catagory = mysqli_real_escape_string($con, $_POST['catagory']);

    $query = "INSERT INTO products (pname,company,pcontent,pprice,catagory) VALUES ('$pname','$company','$pcontent','$pprice','$catagory')";

    $query_run = mysqli_query($con, $query);
    if($query_run)
    {
        $_SESSION['message'] = "Product Added";
        header("Location: ../addproduct.php");
        exit(0);
    }
    else
    {
        $_SESSION['message'] = "Student Not Created";
        header("Location: ../addproduct.php");
        exit(0);
    }
}

?>