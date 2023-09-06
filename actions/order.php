<?php
include_once '../Data/DB.php';
include_once '../helpers/functions.php';
include_once '../helpers/validations.php';
session_start();
class order
{
    public static $suc = [];
    public static $errors = [];
    public static function CleanCart()
    {
        $db=new db();
        $user_id=$_SESSION['auth']['id'];
        $db->Delete('cart',"user_id=$user_id");
    }
    public static function order()
    {
        if (validations::RequestMethod("POST")) {
            $db = new db();
            $user_id = $_SESSION['auth']['id'];
            $adress=functions::sanitaization($_POST['address']);
            $phone=functions::sanitaization($_POST['phone']);
            
            $cart = $db->GetAll('cart', "user_id =$user_id ");
            if(!empty($cart)){
                if(validations::CheckPhone($phone))
            {
            $total = 0;
            foreach ($cart as $product) {
                $total = $total + $product['price']*$product['quantity'];
            }
            $order['total'] = $total;
            $order['user_id'] = $user_id;
            $order['adress']=$adress;
            $order['phone']=$phone;
            $db->create('orders', $order);
            order::$suc[] = 'Your order is on the way ' . $_SESSION['auth']['name'];
            $_SESSION['suc'] = order::$suc;
            order::CleanCart();
            header('location:../home.php');
            die;

        }
        elseif(!validations::CheckPhone($phone)){
            header('location:../handelers/handle_order.php');
            die;
        }
        
    }
    elseif(empty($cart)){
        order::$errors[]="you don't have any product in your cart";
        $_SESSION['errors']=order::$errors;
        header('location:../home.php');
        die;
    }
        
        
       
        
        
        } else {
            header('location:../home.php');
            die;
        }
    }
   
}

order::order();


