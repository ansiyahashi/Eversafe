<!DOCTYPE html>

<html>
<head>

</head>

<script type="text/javascript">
function validation()
{
    var name= document.form.name.value;
    var email=document.form.email.value;
    var password=document.form.password.value;
    var atposition=email.indexOf("@");  
    var dotposition=email.lastIndexOf("."); 
   // alert (atposition); 

    if (name==null || name==""){  
  alert("Name can't be blank");  
  return false;  
}

  
else if(email==null|| email=="")
{

    alert("email can't be blank"); 
}
  

else if (atposition<1 || dotposition<atposition+2 || dotposition+2>=atposition.length){  
  alert("Please enter a valid e-mail address");  
  return false;  
  }

  else if(password==null|| password=="")
{

    alert("password can't be blank"); 
}
else if(password.length<6){  
  alert("Password must be at least 6 characters long.");  
  return false;  

  } 
  else
  {
   // alert("Registration successfull");
  }


 
}  

</script>
<style>


 h1 {
      padding: 10px 0;
      font-size: 100px;
      font-weight: 300;
      text-align: center;
      }
      h2 {
      padding: 10px 0;
      font-size: 20px;
      font-weight: 300;
      text-align: center;
      color:red;
      }
      

      body, div, h1, form{ 
      padding: 0;
      margin: 0;
      outline: none;
      font-family: Roboto, Arial, sans-serif;
      font-size: 16px;
      color: #666;
      background: skyblue;
      }
      .main-block {
      max-width: 380px; 
      min-height: 150px; 
      padding: 10px 0;
      margin: auto;
      border-radius: 5px; 
      border: solid 1px #ccc;
      box-shadow: 1px 2px 5px rgba(0,0,0,.31); 
      background: -webkit-linear-gradient(to right, #155799, #159957); 
  background: linear-gradient(to right, #155799, #159957); 
     
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
      background: green; 
      font-size: 14px;
      font-weight: 600;
      color: #fff;
      }
      btn
      {
        background: #1c87c9; 

      }
      body
      {

        font-family:Arial; 
  background: -webkit-linear-gradient(to right, #155799, #159957); 
  background: linear-gradient(to right, #155799, #159957); 
  color:whitesmoke;
      }

      form
      {
        width:100%;
        hight:100%;
    margin: auto;
    color:whitesmoke;
    backdrop-filter: blur(16px) saturate(180%);
    -webkit-backdrop-filter: blur(16px) saturate(180%);
    background-color: rgba(11, 15, 13, 0.582);
    border-radius: 12px;
    border: 1px solid rgba(255, 255, 255, 0.125);
      }

</style>
<body>

  <h2 align="center">REGISTRATION FORM</h2>   
  <div class="main-block" >

<form method="post" name="form"  onsubmit="return validation()" action="" enctype="multipart/form-data">

<table>

<tr><td >Name</td><td><input type ="text" name="name"><br><br></td></tr>
<tr><td>Email</td><td><input type ="text" name="email"><br><br></td></tr>
<tr><td>Password</td><td><input type ="text" name="password"><br><br></td></tr>
<tr><td>Upload image</td><td><input type="file" name="img" value="" /><br><br></td></tr>
<tr><td colspan="2"><button name="ok" id="button" >REGISTER</button></td></tr>
</table>
   

</form>

  </div>


 


</body>

</html>

<?php
$con=mysqli_connect("localhost","root","","new_db");
/*echo"<pre>";
print_r($_FILES['img']);
echo"</pre>";*/
if(isset($_POST["ok"]))
{
//echo"ok";
if($_POST["name"]==""||$_POST["email"]==""||$_POST["password"]=="")
{
   // echo"please fullfill the details";
}
else
{
    $name=$_POST["name"];
    $email=$_POST["email"];
    $password=$_POST["password"];
    //$img=$_FILES["img"];
    //echo"$name";
    $filename = $_FILES["img"]["name"];

    $tempname = $_FILES["img"]["tmp_name"];  
    $newFilePath = "uploads/" . $_FILES['img']['name'];
    //File is uploaded to temp dir
    move_uploaded_file($tempname, $newFilePath); 

    $qry="insert into registration(name,email,password,photo) values('$name','$email','$password','$filename ')";
    $res=mysqli_query($con,$qry);
    //echo $res;
    if($res)
    {

      echo '<script>alert("Registration successfull")</script>';
    Echo "<center>Registration successfull</center>";
    $Message = "Email Sent";

    header("location:login.php?Message=".$Message);
    }
    else
    {
    Echo "<center>There is some problem in registration</center>";
    }


}

}

?>