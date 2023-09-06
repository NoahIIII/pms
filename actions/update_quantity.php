<?php
include_once '../Data/DB.php';
include_once '../helpers/validations.php';
session_start();
class quantity {

    public static function GetQuantity($product_id,$user_id)
    {
        $db = new db();
        return $db->GetColumn('quantity', 'cart', "product_id = $product_id AND user_id = $user_id"); 
       }
    public static function UpdateQuantity() {
        if (validations::RequestMethod("POST")) {
            $product_id = $_POST['product_id'];
            $user_id = $_POST['user_id'];
            $action = $_POST['action'];

            $current_quantity = quantity::GetQuantity($product_id,$user_id);

            if ($action == '-' && $current_quantity == 1) {
                header('Location: delete_from_cart.php');
                exit;
            } elseif ($action == '+') {
                $new_quantity = $current_quantity + 1;
            } elseif ($action == '-') {
                $new_quantity = $current_quantity - 1;
            }
            
            $db = new db();
            $db->Update('cart', 'quantity', $new_quantity, "product_id = $product_id AND user_id = $user_id");

            header("Location: ../cart.php");
            exit;
        } else {
            header('Location: ../home.php');
            exit;
        }
    }
}

quantity::UpdateQuantity();
