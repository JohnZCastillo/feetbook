<?php

namespace views\components;

class TableLayout
{

    private static function rowData($data)
    {
        echo "<tr>";
        echo "<td>";
        echo $data;
        echo "</td>";
        echo "</tr>";
    }

    private static function row($data)
    {

        echo "<td>";
        echo $data;
        echo "</td>";
    }

    public static function setLayout(array $headers, array $values)
    {

        echo "<table>";

        echo "<thead>";
        echo "<tr>";
        foreach ($headers as $heading) {
            echo TableLayout::row($heading);
        }
        echo "</tr>";
        echo "</thead>";
        echo "<tbody>";

        foreach ($values as $value) {
            echo "<tr>";
            foreach ($value as $data) {
                TableLayout::row($data);
            }
            echo "</tr>";
        }

        echo "</tbody>";

        echo "</table>";
    }
}
