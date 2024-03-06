<?php

require_once "func.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $num1 = $_POST["number1"];
    $num2 = $_POST["number2"];

    $r1 = my_pow($num1, $num2);
    $r2 = factorial($num1);
    $r3 = my_tg($num1);
    $r4 = my_sin($num1);
    $r5 = my_cos($num1);
    $r6 = tangens($num1);


    echo "<table style = 'border:1px solid black'>
<tr style = 'background-color:yellow'>
<td style='border: 1px solid black;padding:10px;text-align: center;'><b>X<sup>y</sup></b></td>
<td style='border: 1px solid black;padding:10px;text-align: center;'><b>X!</b></td> 
<td style='border: 1px solid black;padding:10px;text-align: center;'><b>my_tg(x)</b></td> 
<td style='border: 1px solid black;text-align: center;'><b>sin(x)</b></td> 
<td style='border: 1px solid black;padding:10px; text-align: center;'><b>cos(x)</b></td> 
<td style='border: 1px solid black;padding:10px;text-align: center;'><b>tg(x)</b></td>
</tr>

<tr>
<td style='border: 1px solid black;padding:10px'>$r1 </td>
<td style='border: 1px solid black;padding:10px'>$r2 </td>
<td style='border: 1px solid black;padding:10px'>$r3</td>
<td style='border: 1px solid black;padding:10px'>$r4</td>
<td style='border: 1px solid black;padding:10px'>$r5</td>
<td style='border: 1px solid black;padding:10px'>$r6</td>
</tr>
</table>";
}
?>