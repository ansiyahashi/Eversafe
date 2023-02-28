<?php
echo"<center><h1>registration table</h1></center>";


$con=mysqli_connect("localhost","root","","new_db");
$qry1="update registration set name='achu' ,email='achu@gmail.com' where id=2";
$res1 = mysqli_query($con,$qry1);
if($res1)
{
    echo"updation successfull";
}
else
{
echo"not updated";
}

$qry="select * from registration";

$res = mysqli_query($con,$qry);
//$dis=mysqli_fetch_array($res);
//echo $dis["name"];
echo "<center><table border='5's ><tr><th>id</th><th> name </th><th> email </th><th> password </th></tr></center>";
while($dis=mysqli_fetch_array($res))
{
    echo"<tr><td>".$dis['id']."</td><td>".$dis['name']."</td><td>".$dis['email']."</td><td>".$dis['password']."</td></tr>";



}
echo"</table>";

?>