
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
      max-width: 100%; 
      min-height: 100%; 
      padding: 10px 0;
      margin: auto;
      border-radius: 5px; 
      border: solid 1px #ccc;
      box-shadow: 1px 2px 5px rgba(0,0,0,.31); 
      background: #ebebeb; 
      }

      .sub-block {
      max-width: 20%; 
      min-height: 80%; 
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
      h3{

        color:green;
      }
      .link{

        display: block;
margin: 35 35 35 35px;
      }

</style>
<div class="main-block">
<h2 align="center" style=color:red><?php echo($_SESSION['name']." successfully logined"."<br />");?></h2><br>
<div align="center" class="sub-block">
<h3 align="center">ADD NEW PRODUCTS</h3>

    <form method="post" enctype="multipart/form-data" name="form" >
      <hr>  
    <div><label><b>Product name</b></label><br><b></b><input type ="text" name="pname"><br><br></div>
<hr>
<div><label><b>Discription</b></label><br><textarea name="dis" ></textarea><br><br></div>
<hr>
<div><label><b>Price</b></label><br><input type ="text" name="price"><br><br></div>
<hr>
<div><label><b>Image</b></label><br><input type ="file" name="pimage[]" multiple="multiple"><br><br></div>
<hr>


<button   type="submit" href="welcome.php" name="add">ADD</button><br>
<button type="submit" href="welcome.php" name="view">VIEW</button>
<p class="link"><a   href="login.php" 
>Back</a></p>
<a href="logout.php"
>LOGOUT</a>
    </form>


    </div>






</div>
</body>

</html>


<?php
$con=mysqli_connect("localhost","root","","new_db");
if(isset($_POST['add']))
{
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
        
    $qry="insert into tb_product (p_name,p_description,p_price,p_image) values ('$pname','$pdisc','$pprice','$filename')";
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