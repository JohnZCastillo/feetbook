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

    public static function setLayout(array $headers, array $values, $id)
    {

        $page = [];

        echo "<table id='" . $id . "'>";

        echo "<thead>";
        echo "<tr>";
        foreach ($headers as $heading) {
            echo TableLayout::row($heading);
        }
        echo "</tr>";
        echo "</thead>";
        echo "<tbody>";

        $count = 1;

        foreach ($values as $value) {

            $classId = "$id-page-1";

            if ($count > 10) {
                $classId = "$id-page-" . (((int) ($count / 10)) + 1);
            }

            if ($count > 10) {
                echo "<tr class = \"$classId hide\">";
            } else {
                echo "<tr class='" . $classId . "'>";
            }

            foreach ($value as $data) {
                TableLayout::row($data);
            }
            echo "</tr>";
            $count++;
        }

        echo "</tbody>";

        echo "</table>";

        if ($count <= 10) return;

        $add = $count % 10;
        $add = 10 - $add;

        echo "<div class='pagination-wrapper'>";

        $data1 = "'$id'";

        for ($i = 1; $i < $count + $add; $i += 10) {
            if ($i > 1) {

                $value =  (int)($i / 10) + 1;
                $data2 = "'$value'";
                echo "<span class=\"pagination\" onclick=\"showPagination($data1,$data2)\">$value</span>";

                continue;
            }

            echo "<span class='pagination' onclick=\"showPagination($data1,'1')\">1</span>";
        }

        echo "</div>";
    }
}
