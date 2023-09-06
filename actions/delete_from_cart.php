<?php
include_once '../Data/DB.php';
include_once '../helpers/validations.php';
session_start();
class Delete
{
    public static $suc = [];

    public static function DeleteFromCart()
    {

        if (validations::RequestMethod("POST")) {
            $product_id = $_POST['product_id'];
            $db = new db();
            $db->Delete('cart', "product_id = $product_id");
            Delete::$suc[] = "product removed from your cart";
            $_SESSION['suc'] = Delete::$suc;
            header("location:../cart.php");
            die;
        } else {
            header("location:../cart.php");
            die;
        }
    }
}
Delete::DeleteFromCart();
