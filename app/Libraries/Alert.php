<?php

namespace App\Libraries;

class Alert
{
    public static function message($msg)
    {
        echo '<script>alert("' . $msg . '")</script>';
        return (new self);
    }

    public static function redirect($url)
    {
        echo "<script>window.location.href = '$url'</script>";
        return (new self);
    }
}
