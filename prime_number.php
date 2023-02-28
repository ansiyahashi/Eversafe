<?php
$number=4;

//$number = (int)readline('enter a number');

$temp=0;
for($i=2;$i<=$number/2;$i++)
{
    if($number%2==0)
    $temp=$temp+1;
}

if($temp==0 && $number!=1)
{
    echo"the number ".$number." is prime number";
}
else
{
    echo"the number ".$number." is  not a prime number"; 
}


?>