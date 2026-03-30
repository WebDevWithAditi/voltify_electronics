<?php
session_start();
include 'admin/includes/config.php';

if(isset($_GET['id']))
{
    $id = $_GET['id'];

    $sq = "select * from product where p_id='$id'";
    $res = mysqli_query($con, $sq);
    $row = mysqli_fetch_array($res);

    $product = [
        "id" => $row['p_id'],
        "name" => $row['p_name'],
        "price" => $row['p_price'],
        "image" => $row['p_photo'],
        "qty" => 1
    ];

    // If cart already exists
    if(isset($_SESSION['cart']))
    {
        $found = false;

        foreach($_SESSION['cart'] as &$item)
        {
            if($item['id'] == $id)
            {
                $item['qty']++;
                $found = true;
                break;
            }
        }

        if(!$found)
        {
            $_SESSION['cart'][] = $product;
        }
    }
    else
    {
        $_SESSION['cart'][] = $product;
    }

    header("location:viewcart.php");
}
?>