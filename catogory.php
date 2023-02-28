<html>
    <head>

    </head>
    <body>
       
        <form method="post">
       
        <label for="CATEGORY-DROPDOWN">Category</label>
<select class="form-control" id="category-dropdown" name="catogory">
<option value="">Select Catogory</option>
<?php
$con=mysqli_connect("localhost","root","","new_db");
$qry="select c_id,c_name from catogories";
$res=mysqli_query($con,$qry);
while($row2=mysqli_fetch_array($res))
{
$id=$row2['c_id'];
$cname=$row2['c_name'];


$_SESSION['id']=$_POST['catogory']
?>
<option value="<?php echo $id; ?>" ><?php echo $cname; ?> </option>
<?php
}
?>
</select><br><br>



<select class="form-control" id="category-dropdown" name="subcatogory">
<option value="">Select Sub Catogory</option>
<?php
if(isset($_POST['catogory']))
$c_id=$_POST['catogory'];
echo"hii";

$qry1="select sc_id,sc_name from subcatogory ";
$res=mysqli_query($con,$qry1);
//echo$res;
while($row2=mysqli_fetch_array($res))
{
$sid=$row2['sc_id'];
$scname=$row2['sc_name'];


?>
<option value="<?php echo $sid; ?>" ><?php echo $scname; ?> </option>
<?php
}
?>
</select><br><br>
<input type="submit" name="submit">




<?php
if(isset($_POST['catogory']) && isset($_POST['submit']))
{

    $ct_id=$_POST['catogory'];
    //echo($_SESSION['id']);
    echo$c_id;

    $act_id=$_POST['subcatogory'];

    echo$act_id;
}

?>



        </form>
  
    </body>
    <?php
    /*
    $con=mysqli_connect("localhost","root","","new_db");
    $qry="select c_id,c_name from catogories";
    $res=mysqli_query($con,$qry);
    echo "<td><select name='cat'>";
    echo "<option>Category</option>";
    while($row2=mysqli_fetch_array($res))
    {

        echo "<option value=".$row2['c_id'].">".$row2['c_name']."</option>";
    }

    echo "</select></td><br>";

//$s=$_POST['cat'];
   // echo$s;


    $qry1="select sc_name,sc_id from subcatogory where c_id=$s";
    $res1=mysqli_query($con,$qry1);
    echo "<td><select>";
    echo "<option>Sub Category</option>";
    while($row2=mysqli_fetch_array($res1))
    {

        echo "<option value=".$row2['sc_id']." >".$row2['sc_name']."</option>";
    }

    echo "</select></td><br>";

    */
    ?>


</html>