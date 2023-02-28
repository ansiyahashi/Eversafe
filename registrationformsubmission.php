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
 
 
}  

</script>

<body>
 <h2 align="center">REGISTRATION FORM</h2>   
<form method="post" name="form"  onsubmit="return validation()"  action="" enctype="multipart/form-data">
    <div align="center">
Name: &nbsp&nbsp&nbsp&nbsp&nbsp<input type ="text" name="name"><br><br>
Email: &nbsp&nbsp&nbsp&nbsp&nbsp<input type ="text" name="email"><br><br>
Password: <input type ="text" name="password"><br><br>
photo:  <input type="file" name="img" value="" /><br><br>
<br><br>
<input type ="submit" name="ok" id="button1" >
<input type ="button" name="view" id="button2" value="view" onClick="window.location.href = 'viewtable.php'">
<input type ="button" name="update" id="button3" value="update" onClick="window.location.href = 'update table.php'">
<input type ="button" name="delete" id="button4" value="delete" onClick="window.location.href = 'deletetablevalue.php'">
</div>


</form>




</body>

</html>




<?php

$con=mysqli_connect("localhost","root","","new_db");

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
    //echo"$name";
    $filename = $_FILES["img"]["name"];

    $tempname = $_FILES["img"]["tmp_name"];  

    $qry="insert into registration(name,email,password,photo) values('$name','$email','$password','$filename ')";
    $res=mysqli_query($con,$qry);
    //echo $res;
    if($res)
    {
      move_uploaded_file($filename,$tempname);
    Echo "Record successfully inserted";
    }
    else
    {
    Echo "There is some problem in inserting record";
    }


}

}

?>