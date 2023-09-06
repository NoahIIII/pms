<?php
session_start();
include_once '../Data/DB.php';
include_once '../helpers/validations.php';
include_once '../helpers/functions.php';
class admin_actions{
    public static $suc=[];
    public static $errors=[];
    public static function AddProduct(){
        if(validations::RequestMethod("POST"))
        {
           $product_name=functions::sanitaization($_POST["product_name"]);
           $product_price=functions::sanitaization($_POST["product_price"]);
           $product_category=functions::sanitaization($_POST["product_category"]);
           $image=functions::HandleImage('products_image');
           $product['name']=$product_name;
           $product['price']=$product_price;
           $product['category_name']=$product_category;
           $product['image']=$image;
           $db = new db();
           $db->create('products',$product);
           admin_actions::$suc[]='product added';
           $_SESSION['suc']=admin_actions::$suc;
           header('location:../dashboard.php');
           die;
         }
         else
         {
            header('location:../dashboard.php');
            die;
         }
}
public static function RemoveProduct()
{
    if(validations::RequestMethod("POST"))
    {
        $db=new db();
        $product_id=$_POST['product_id'];
        $product=$db->GetColumn('name','products',"id = $product_id");
        if(!empty($product)){
        $db->Delete('products',"id = $product_id" );
        admin_actions::$suc[]='product removed';
        $_SESSION['suc']=admin_actions::$suc;
        header('location:../dashboard.php');
        die;
        }
        else{
              admin_actions::$errors[]='product not found';
              $_SESSION['errors']=admin_actions::$errors;
              header('location:../dashboard.php');
              die;

        }
    }
    else{
        header('location:../dashboard.php');
        die;
    }
}
public static function AddCategory(){
    if(validations::RequestMethod("POST"))
    {
       $category_name=functions::sanitaization($_POST["category_name"]);
      
       $category['name']=$category_name;
   
       $db = new db();
       $db->create('categories',$category);
       admin_actions::$suc[]='category added';
       $_SESSION['suc']=admin_actions::$suc;
       header('location:../dashboard.php');
       die;
     }
     else
     {
        header('location:../dashboard.php');
        die;
     }

}
public static function RemoveCategory()
{
    if(validations::RequestMethod("POST"))
    {
        $db=new db();
        $category_name=$_POST['category_name'];
        $category=$db->GetColumn('name','categories',"name='$category_name'");
        if(!empty($category)){
            $db->Delete('products',"category_name='$category_name' ");
        $db->Delete('categories',"name='$category_name'" );
        admin_actions::$suc[]='category removed';
        $_SESSION['suc']=admin_actions::$suc;
        header('location:../dashboard.php');
        die;
        }
        else{
              admin_actions::$errors[]='category not found';
              $_SESSION['errors']=admin_actions::$errors;
              header('location:../dashboard.php');
              die;

        }
    }
    else{
        header('location:../dashboard.php');
        die;
    }
}
}
$action=$_POST['action'];
if($action=='add product')
{
    admin_actions::AddProduct();
}
elseif($action=='remove product'){
    admin_actions::RemoveProduct();

}
elseif($action=='add category')
{
    admin_actions::AddCategory();
}
elseif($action=='remove category')
{
    admin_actions::RemoveCategory();
}