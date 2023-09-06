<?php
session_start();
include_once '../Data/DB.php';
include_once '../helpers/validations.php';
class cart {
        public static $suc=[];

    public static function AddToCart(){
        if(validations::RequestMethod("POST"))
        
        {
            $db=new db();
            $product_id=$_POST['product_id'];
            $user_id=$_SESSION['auth']['id'];
            $quantity=$db->GetColumn('quantity','cart',"product_id = $product_id AND user_id = $user_id");
            if($quantity==NULL){
            $product= $db->GetBy('products', "id = $product_id");
            $cart['user_id']= $user_id;
            $cart['product_id']=$product_id;
            $cart['quantity']=1;
            $cart['price']=$product['price'];
            $db->create('cart',$cart);
            cart::$suc[]= $product['name']. ' Added to your cart';
            $_SESSION['suc']=cart::$suc;
            header('location:../home.php');
            die;
            }
            else
            {
               $quantity= $db->GetColumn('quantity', 'cart', "product_id = $product_id AND user_id = $user_id");
               $db->Update('cart','quantity',$quantity+1,"product_id = $product_id AND user_id = $user_id");
               header('location:../home.php');

            }
        }
        else
        {
            header('location:../home.php');
            die;
        }
    }
}
cart::AddToCart();