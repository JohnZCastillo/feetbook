<?php

namespace views\components;

class Footer
{
    public static function getFooter()
    {

        echo "
        <footer class='container-fluid bg-dark text-light font-family-poppins py-3'>

            <div class='row justify-content-sm-center text-center text-md-start small w-75 mx-auto text-secondary'>
                <div class='col'>
                    <img src='./resources/images/logo/logo_light.png' style='width:120px; height:auto;'>
                </div>

                <div class='col my-3'>
                    <h5 class='text-light'>Navigation</h5>
                    <a href='' class='d-block text-decoration-none text-secondary'>Home</a>
                    <a href='./php/page/Products.php' class='d-block text-decoration-none text-secondary'>Products</a>
                    <a href='./php/page/OurTeam.php' class='d-block text-decoration-none text-secondary'>Our Team</a>
                    <a href='./php/page/AboutUs.php' class='d-block text-decoration-none text-secondary'>About Us</a>
                </div>
                <div class='col my-3'>
                    <h5 class='text-light'>Visit</h5>
                    <p>Imus Cavite Philippines</p>
                </div>
                <div class='col my-3'>
                    <h5 class='text-light'>Call Us</h5>
                    <p>09123456789</p>
                </div>
                <div class='col my-3'>
                    <h5 class='text-light'>Email Us</h5>
                    <p>shoepa@gmail.com</p>
                </div>
            </div>
            <div class='py-3 border-top border-secondary text-secondary w-75 mx-auto'>
                <p class='text-center small'>All Rights Reserved 2022</p>
            </div>
        </footer>";
    }
}
