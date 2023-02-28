<?php
//$number=1221;
$number = readline('enter a number');

$n=$number;
$rev=0;
while($n>1)
{
$mod=$n%10;
$rev=$rev*10+$mod;
$n=$n/10;

}

if($number==$rev)
{
    echo" the given number ".$number." is palindrome";
}
else
{
    echo" the given number ".$number." is not a  palindrome";

}


?>