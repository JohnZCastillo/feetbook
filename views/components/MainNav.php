<?php

namespace views\components;


class MainNav
{

    public static function nav()
    {
        echo "  <nav class='nav'>
        <div class='nav__logo'>
            <span>FeetBook</span>
        </div>
        <a href='./home' class='nav__link'>Home</a>
        <a href='./login' class='nav__link'>Log In</a>
        <a href='./signup' class='nav__link'>Sign Up</a>
    </nav>";
    }
}
