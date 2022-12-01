<?php

namespace views\components;

use model\user\User;

class ServiceProvider
{

    public static function showDetails(User $user, $class)
    {

        echo "<tr class= '" . $class . "'>";
        echo "<td>";
        echo $user->getId();
        echo "</td>";
        echo "<td>";
        echo $user->getName();
        echo "</td>";
        echo "<td>";
        echo $user->getEmail();
        echo "</td>";
        echo "<td>";
        echo $user->getBirthday();
        echo "</td>";
        echo "<td>";
        if ($user->isValid()) {
            echo 'verified';
        } else {
            echo 'temporary';
        }
        echo "</td>";
        echo "<td>";
        echo "<button class='action-btn'>block</button>";
        echo "<button class='action-btn'>validated</button>";
        echo "</td>";
        echo "</tr>";
    }
}
