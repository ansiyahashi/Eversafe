
<html>
<head>
</head>

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
      background: lightblue;
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
        display: inline-block;
        background-color: green;
        padding: 20px;
        width: 50%;
        color: #ffffff;
        text-align: center;
        height:5px;

      }
      btn
      {
        background: #1c87c9; 

      }

</style>

<body>

 
 <div class="main-block ">

 <h2 align="center">update</h2>   
<form method="POST" name="form"  onsubmit="return validation()" action="" enctype="multipart/form-data">
    <div align="center">
        <table>
<tr><td>Name</td><td><input type ="text" name="name2" value="<?php echo $_GET['nm']?>"><br><br></td></tr>

<tr><td>Email</td><td><input type ="text" name="email2" value="<?php echo $_GET['em']?>"><br><br></td></tr>
<tr><td>Password</td><td><input type ="text" name="password2" value="<?php echo $_GET['psw']?>"><br><br></td></tr>
<tr><td></td><td><input type="hidden" name="imgtxt" value="<?php echo $_GET['im']?>" /></td><br></tr>
<tr><td>Upload photo</td><td><input type="file" name="img2" value="<?php echo $_GET['im']?>" /><img src='<?php echo 'uploads/'.$_GET['im']?>' width=30px height=40px><br><br></td></tr>
<tr><td ></td><td><button name="update" id="button" value="update"  style="width:50%   " >UPDATE</button><br><br></td></tr>

        </table>


</div>


</form>


   

</body>

</html>
<?php
//echo"hii";
$con=mysqli_connect("localhost","root","","new_db");
$id=$_GET['id'];
$nm=$_GET['nm'];
$em=$_GET['em'];
$psw=$_GET['psw'];
$im=$_GET['im'];
//echo$im;
if(isset($_POST['update']))
{

$u_name=$_POST['name2'];
$u_email=$_POST['email2'];
$u_psw=$_POST['password2'];
$u_image=$_FILES['img2']['name'];
if($u_image=="")
{
   $new_phto=$im;
}
else
{
    $new_phto=$u_image;
}

//echo$id;
$qry="update registration set name='$u_name', email='$u_email',password='$u_psw' ,photo='$new_phto' where id='$id'";
$res = mysqli_query($con,$qry);

if($res)
{
    echo"<font color='red'>UPDATED SUCCESSFULLY</font>";
    header('Location: viewtable.php');
}
else
 {
    echo"<font color='red'>FAILED TO UPDATE</font>";
}
}




