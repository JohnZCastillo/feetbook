<?php

namespace views\components;

class SideNav
{
    public static function getSideNav()
    {
        echo "
    <div>
    <nav class='admin_nav'>
        <span class='mb-2 nav__brand'>Web-Based Service <br> Market-System</span>
        <a class='nav__link  btn-1'>Dashboard</a>
        <a class='nav__link  btn-2'>Customers</a>
        <a class='nav__link  btn-3'>Service Provider</a>
        <a class='nav__link  btn-4'>Services Category</a>
        <a class='nav__link  btn-5'>Services</a>
        <a href='./logout' class='nav__link'>Logout</a>
    </nav>
</div>";
    }
}
