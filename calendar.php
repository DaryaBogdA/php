<?php

// Определяем текущий год или получаем выбранный
$year = (int)$_GET['year'];

function generate_calender($year)
{
    echo "<h2>Календарь на $year год</h2>";
    echo "<table>";

    for ($month = 1; $month <= 12; $month++) {
        echo "<tr>
                <th colspan='7' style='background-color: #0048ff; color: white;'>" . date("F", mktime(0, 0, 0, $month, 1, $year)) . "</th>
              </tr>";
        echo "<tr><th>Пн</th><th>Вт</th><th>Ср</th><th>Чт</th><th>Пт</th><th>Сб</th><th>Вс</th></tr>";

        $first_day = date("N", mktime(0, 0, 0, $month, 1, $year));
        $days_in_month = date("t", mktime(0, 0, 0, $month, 1, $year));

        echo "<tr>";
        for ($i = 1; $i < $first_day; $i++) {
            echo "<td></td>";
        }

        for ($day = 1; $day <= $days_in_month; $day++) {
            $weekday = date("N", mktime(0, 0, 0, $month, $day, $year));
            echo "<td>$day</td>";

            if ($weekday == 7) {
                echo "</tr><tr>";
            }
        }

        echo "</tr>";
    }

    echo "</table>";
}

echo "<a href='?year=2024'><button style='background-color: #ff0000; color: white;'>2024</button></a> ";
echo "<a href='?year=2025'><button style='background-color: #ff7200; color: white;'>2025</button></a> ";
echo "<a href='?year=2026'><button style='background-color: #07ff00; color: white;'>2026</button></a>";

generate_calender($year);

