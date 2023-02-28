<?php
$number=5;
//$number=readline('enter a number');
$fact=1;


for($i=$number;$i>=1;$i--)
{

    $fact=$fact*$i;
}

echo"factorial of the number ".$number." is :" .$fact;

?>