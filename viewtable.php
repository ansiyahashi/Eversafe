<?php
echo"<center><h1>registration table</h1></center>";


$con=mysqli_connect("localhost","root","","new_db");

$qry="select * from registration";

$res = mysqli_query($con,$qry);
//$dis=mysqli_fetch_array($res);
//echo $dis["name"];
echo "<center><table border='5' bgcolor=gainsboro width=50% height=30%><tr><th bgcolor=lightgreen>id</th><th bgcolor=lightgreen> name </th><th bgcolor=lightgreen> email </th><th bgcolor=lightgreen> password </th><th bgcolor=lightgreen>photo</th><th bgcolor=lightgreen>delete</th><th bgcolor=lightgreen>edit/update</th></tr></center>";
while($dis=mysqli_fetch_array($res))
{ 
    $phto=$dis['photo'];
    $path="uploads/".$phto;
    //echo$phto;
    //$a="uploads";
   //echo$path;
    //$img='uploads\'.$phto';
   
    
    echo"<tr><td>".$dis['id']."</td><td>".$dis['name']."</td><td>".$dis['email']."</td><td>".$dis['password']."</td><td><img src='$path' width=40px height=40px></td>";
    //echo"<td><form action='' method='post'><button style='background-color:green;' name='dlt' >delete</button></td></tr>";
    echo"<td><a href='deleteview.php?id=$dis[id]'>Delete</a></td>";
    echo"<td><a href='updateview.php?id=$dis[id] & nm=$dis[name] & em=$dis[email] & psw=$dis[password] & im=$dis[photo] '>Edit/delete</a></td></tr>";
  
  // echo "<img src='$phto'>";
$id=$dis['id'];
//echo$id;
}
echo"</table>";
if(isset($_POST['dlt']))
{
   /* if(isset($_POST['id']))
    {
        echo "hllo";
    }*/

   // $id=$dis['id'];
    //echo$id;
    
   // $query = "DELETE FROM registration WHERE id={$_POST['id']}";

   /* $id= $dis['id'];
    echo$id;*/
   // echo"hii";
    /*$qry1="delete * from registration where id='$dis['id']'";
    $res = mysqli_query($con,$qry1);
    if($res)
    {
        echo"deleted";
    }*/
}


?>