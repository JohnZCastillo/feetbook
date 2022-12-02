<?php

namespace views\components;


class MainNav
{

    public static function nav()
    {
        echo "  <nav class='nav'>
        <div class='nav__logo'>
            <span>Web-based Service</span>
            <br>
            <span>Market System</span>
        </div>
        <a href='./explore' class='nav__link'>Explore</a>
        <a href='./login' class='nav__link'>Login</a>
        <a href='./signup' class='nav__link'>Singup</a>
        <a href='./findjob' class='nav__link'>Find a Job</a>
    </nav>";
    }
}
