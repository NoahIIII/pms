<?php
class functions{
    public static function sanitaization($input)
    {
        return trim(HTMLSPECIALCHARS(htmlentities($input)));
    }
    public static function HandleImage($folder)
    {
        $image = $_FILES['image'];
        $imagename = $_FILES['image']['name'];
        $imagenameTMP = $_FILES['image']['tmp_name'];
        $imageEX = explode('.', $imagename);
        $imagerealex = strtolower(end($imageEX));
        $imagenewname = uniqid('', true) . '.' . $imagerealex;
        $imagelocation = '../'.$folder.'/' . $imagenewname;
        move_uploaded_file($imagenameTMP, $imagelocation);
        return $folder.'/'.$imagenewname;
    }
}