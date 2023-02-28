
 
<?php

echo"<center><h1><font color=red>PRODUCT DETAILS</font></h1></center>";


$con=mysqli_connect("localhost","root","","new_db");

$qry="select * from tb_product";

$res = mysqli_query($con,$qry);


echo "<center><table border='5' bgcolor=gainsboro width=50% height=30% ><tr><th bgcolor=lightblue >id</th><th bgcolor=lightblue> product name </th><th bgcolor=lightblue> discription </th><th bgcolor=lightblue> price </th><th bgcolor=lightblue>photo</th><th colspan='2' bgcolor=lightblue>operatiions</th></tr></center>";
while($dis=mysqli_fetch_array($res))
{ 
    $phto=$dis['p_image'];
    //echo$phto;
    $path="uploads/".$phto;
    
    //echo$path;
    //echo$path
    //echo$phto;
    echo"<tr><td>".$dis['p_id']."</td><td>".$dis['p_name']."</td><td>".$dis['p_description']."</td><td>".$dis['p_price']."</td><td><img src='$path' width=30px height=40px'>"."</td>";
    echo"<td><a href='p_deleteview.php?rn=$dis[p_id]'>Delete</a></td>";
    echo"<td><a href='p_editview.php?id=$dis[p_id] & nm=$dis[p_name] & di=$dis[p_description] & prc=$dis[p_price] & im=$dis[p_image] '>Edit/Update</a></td></tr>";
    //echo"<img src='Screenshot_1675835632.png' alt=''/>";
    //echo"<td><form action='' method='post'><button style='background-color:green;' name='dlt' >delete</button></td></tr>";


  // echo "<img src='$phto'>";

//echo$id;
}
echo"</table>";
?>