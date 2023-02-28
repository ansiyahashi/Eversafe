<?php
//echo"hii";
$con=mysqli_connect("localhost","root","","new_db");
$id=$_GET['rn'];
echo$id;
$qry="delete  from registration where id='$id'";
$res = mysqli_query($con,$qry);

if($res)
{
    echo"<font color='red'>RECORD DELETED FROM DATABASE</font>";
    header('Location: viewtable.php');
}
else
 {
    echo"<font color='red'>FAILED TI RECORD THE RECORD</font>";
}
?>