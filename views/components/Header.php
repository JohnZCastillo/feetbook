<?php

namespace views\components;

class Header
{

    //return the header
    public static function getHeader()
    {
        echo "
        <link rel='stylesheet' href='./resources/css/style.css'>

        <!-- Google Font -->
        <link rel='preconnect' href='https://fonts.googleapis.com'>
        <link rel='preconnect' href='https://fonts.gstatic.com' crossorigin>
        <link href='https://fonts.googleapis.com/css2?family=Poppins&display=swap' rel='stylesheet'>
    
        <!-- fontawesoome -->
        <script src='https://kit.fontawesome.com/f0632fdfe1.js' crossorigin='anonymous'></script>
        ";
    }
}
