<?php
$output = <<<HTML
<table style="border: 1px solid black">
    <thead>
        <tr>
            <th style="border: 1px solid black">Number</th>
            <th style="border: 1px solid black">Square</th>
        </tr>
    </thead>
    <tbody>

HTML;

$totalSum = 0;

for ($i = 0; $i <= 100; $i += 2) {
    $table .= '<tr>';
    $sqrt = round(sqrt($i), 2);
    $totalSum += $sqrt;
    $output .= "\t\t<tr>\n\t\t\t<td style='border: 1px solid black'>{$i}</td>\n\t\t\t<td style='border: 1px solid black'>{$sqrt}</td>\n\t\t</tr>\n";
}

$totalSum = round($totalSum, 2);

$output .= <<<HTML
        <tr>
            <td style="border: 1px solid black"><strong>Total:</strong></td>
            <td style="border: 1px solid black">{$totalSum}</td>
        </tr>
    </tbody>
</table>
HTML;

echo $output;