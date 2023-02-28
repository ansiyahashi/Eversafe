
<?php session_start();?>
<html>
    <head>

    </head>

<body>
<style>


 h1 {
      padding: 10px 0;
      font-size: 100px;
      font-weight: 300;
      text-align: center;
      }

      body, div, h1, form{ 
      padding: 0;
      margin: 0;
      outline: none;
      font-family: Roboto, Arial, sans-serif;
      font-size: 16px;
      color: #666;
      }
      .main-block {
      max-width: 380px; 
      min-height: 460px; 
      padding: 10px 0;
      margin: auto;
      border-radius: 5px; 
      border: solid 1px #ccc;
      box-shadow: 1px 2px 5px rgba(0,0,0,.31); 
      background: #ebebeb; 
      }
      form {
      margin: 0 30px;
      }
      hr {
      color: #a9a9a9;
      opacity: 0.3;
      }
      button
      {
        width: 100%;
      padding: 10px 0;
      margin: 10px auto;
      border-radius: 5px; 
      border: none;
      background: #1c87c9; 
      font-size: 14px;
      font-weight: 600;
      color: #fff;
      }

</style>
<div class="main-block">
<h2 align="center" style=color:red><?php echo($_SESSION['name']." successfully logined"."<br />");?></h2><br>

<h3 align="center">ADD NEW PRODUCTS</h3>
<div align="center">
    <form method="post" enctype="multipart/form-data" name="form" >
      <hr>  
    <div>Product name<br><b></b><input type ="text" name="pname"><br><br></div>
<hr>
  <div>   
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
</div>  

<hr>
<div>
<label for="CATEGORY-DROPDOWN">Sub Category</label>
<select class="form-control" id="category-dropdown" name="subcatogory">
<option value="">Select Sub Catogory</option>
<?php
if(isset($_POST['catogory']))
$c_id=$_POST['catogory'];
//echo"hii";

$qry1="select sc_id,sc_name from subcatogory  ";
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
</div><hr>
<br><br>
<hr>
<div>Discription<br><textarea name="dis" ></textarea><br><br></div>
<hr>
<div>price<br><input type ="text" name="price"><br><br></div>
<hr>
<div>image<br><input type ="file" name="pimage[]" multiple="multiple"><br><br></div>
<hr>


<button type="submit" href="welcome.php" name="add">ADD</button><br>
<button type="submit" href="welcome.php" name="view">VIEW</button>

    </form>


    </div>





<a href="login.php"
>Back</a>
<a href="logout.php"
>LOGOUT</a>
</div>
</body>

</html>


<?php
$con=mysqli_connect("localhost","root","","new_db");
if(isset($_POST['add']))
{

    $ct_id=$_POST['catogory'];
    $sct_id=$_POST['subcatogory'];
    
    echo$ct_id;
 /*echo"<pre>";
 print_r($_FILES['pimage']);
 echo"</pre>";  */

//echo"hii";
$pname=$_POST['pname'];
$pdisc=$_POST['dis'];
//echo$pdisc;
$pprice=$_POST['price'];
//$image=$_FILES['pimage'];




/*$filename = $_FILES["pimage"]["name"];

    $tempname = $_FILES["pimage"]["tmp_name"];  */

    
  

    $files = array_filter($_FILES['pimage']['name']); //Use something similar before processing files.
    // Count the number of uploaded files in array
    $total_count = count($_FILES['pimage']['name']);
    // Loop through every file
    for( $i=0 ; $i < $total_count ; $i++ ) {
       //The temp file path is obtained
       $tmpFilePath = $_FILES['pimage']['tmp_name'][$i];
       $filename=$_FILES['pimage']['tmp_name'][$i];
       //A file path needs to be present
       //if ($tmpFilePath != ""){
       //echo$tmpFilePath;
    
          //Setup our new file path
         // $newFilePath = "uploads/" . $_FILES['pimage']['name'][$i];
          //File is uploaded to temp dir
          //if(move_uploaded_file($tmpFilePath, $newFilePath)) {
             //Other code goes here
          }
       
//$filename = $image['name'];
/*echo"<pre>";
print_r($filename);
echo"</pre>";*/
//$path="uploads/".$filename;

//$tmp_name = $_FILES['pimage']['tmp_name'];  
//echo$pname.$pdisc.$pprice;

/*$file_seperate=explode('.',$filename);
$file_extension=strtolower(end($file_seperate));
$extension=array('jpeg','jpg','png');*/

if($pname==""||$pdisc==""||$pprice==""||$filename=="")
{
echo"<p><font color=green><center>please fullfill product details</center></font></p>";

}
else{

    $files = array_filter($_FILES['pimage']['name']); //Use something similar before processing files.
// Count the number of uploaded files in array
$total_count = count($_FILES['pimage']['name']);
// Loop through every file
for( $i=0 ; $i < $total_count ; $i++ ) {
   //The temp file path is obtained
   $tmpFilePath = $_FILES['pimage']['tmp_name'][$i];
   $filename=$_FILES['pimage']['name'][$i];
   //A file path needs to be present
   //if ($tmpFilePath != ""){
   //echo$tmpFilePath;

      //Setup our new file path
      $newFilePath = "uploads/" . $_FILES['pimage']['name'][$i];
      //File is uploaded to temp dir
      move_uploaded_file($tmpFilePath, $newFilePath); 
         //Other code goes here
      
   
    /*if(in_array($file_extension,$extension))
          {
                $upload_image='uploads/'.$filename;
                move_uploaded_file($tmp_name,$upload_image);

          }8*/
        
    $qry="insert into tb_product (p_name,p_description,p_price,p_image,c_id,sc_id) values ('$pname','$pdisc','$pprice','$filename',' $ct_id','$sct_id')";
    $res=mysqli_query($con,$qry);
    //echo$res;
        }
    if($res)
    {

        
       /* $p=pathinfo($filename, pathinfo);
        echo$p;*/
       
        //echo"<center>product successfully added</center>";
        echo"<p><font color=green><center>product successfully added</center></font></p>";

       header('location:viewproduct.php');
    }
    else
    {
        //echo"<center>failed to add product</center>";
        echo"<p><font color=red><center>failed to add product</center></font></p>";
    }
    

}

}
if(isset($_POST['view']))
{
    header('location:viewproduct.php');
}

?>