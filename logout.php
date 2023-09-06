<?php
class logout
{
    public static function logout()
    {
        session_start();
        session_unset();
        session_destroy();
        header("location:index.php");
        die;
    }
}
logout::logout();