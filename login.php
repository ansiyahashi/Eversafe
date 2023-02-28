<?php session_start();?>
<html>
<head>

</head>
<script type="text/javascript">
function validation()
{
    var username= document.form.username.value;
    var password=document.form.password.value;

    var atposition=username.indexOf("@");  
    var dotposition=username.lastIndexOf("."); 
   // alert (atposition); 

    if (username==null || username==""){  
  alert("username can't be blank");  
  return false;  
}

  
else if(password==null|| password=="")
{

    alert("password can't be blank"); 
}
  

else if (atposition<1 || dotposition<atposition+2 || dotposition+2>=atposition.length){  
  alert("Please enter a valid username");  
  return false;  
  }

 
else if(password.length<6){  
  alert("Please enter a valid password");  
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
      background: skyblue; 
      }

      .sub-block {
      max-width: 400px; 
      min-height: 460px; 
      padding: 10px 0;
      margin: auto;
      border-radius: 5px; 
      border: solid 1px #ccc;
      box-shadow: 1px 2px 5px rgba(0,0,0,.31); 
      background: light gray; 
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
      background:  green;
      color:white; 
      font-size: 14px;
      font-weight: 600;
      
     
      }
      h1
      {
        color:yellow;
        font-size: 35px;

      }
      body
      {

        background: #456;
  font-family: 'Open Sans', sans-serif;
      }

</style>
<body>
    <div class="main-block">
    
    <hr>
    <form method="post" name="form"  onsubmit="return validation()">
    <div align="center" class="sub-block">
    <h1 align="center" style="color:red" >LOGIN</h1>
        <table>

<tr><td><label style="color:black">username</label>   </td><td><input type="text" name="username"style="width: 100%" value="<?php if(isset($_COOKIE['username'])){echo $_COOKIE['username'];}; ?>" ><br/><br/>
</td></tr>
<tr><td>  <label style="color:black">password</label>  </td><td><input type="password" name="password"style="width:100%" value="<?php if(isset($_COOKIE['password'])){echo $_COOKIE['password'];}; ?>"><br/><br/></td></tr>


<tr><td></td><td><input type="checkbox" name="remember" value="remember"  />&nbsp&nbsp;  <label style="color:black">Remember Me</label><br/><br></td></tr>

<tr><td><a href="registration.php" style="color:blue">Signup</a></td><td><button name="login1" id="btn">login</button><br/></td></tr>





        </table>

    </div>
</form>

    </div>

</body>

</html>

<?php
/*$con=mysqli_connect("localhost","root","","new_db");
if(isset($_post["login1"]))
{
    echo"done";
    $uname=$_post["username"];
    $pswd=$_post["password"];


$qry="select * from registration where username=$uname && password=$pswd";
$res=mysqli_query($con,$qry);
$count=mysqli_num_rows($res);
if($count)
{
    echo"welcome";
}
else{
    echo"please login";
}

}*/
if(isset($_GET['Message'])){
    $msg=$_GET['Message'];
    echo '<script>alert("registration successfull")</script>';
    //echo$msg;
}

$con=mysqli_connect("localhost","root","","new_db");
if(isset($_POST["login1"]))
{
    //echo"hii";
    $uname=$_POST["username"];
    $pswd=$_POST["password"];
   // echo $uname;
   $qry="select count(*) as cntUser  from registration where email='".$uname."' and password='".$pswd."'";

   $res = mysqli_query($con,$qry);
   //echo $res;
$dis=mysqli_fetch_array($res);
//echo $dis["name"];
$count=$dis['cntUser'];
//echo$count;
if($count>0)
{
    $qry1="select name  from registration where email='".$uname."' and password='".$pswd."'";
    $res1 = mysqli_query($con,$qry1);
    $dis1=mysqli_fetch_array($res1);
    //echo$dis1['name'];
    $_SESSION['name']=$dis1['name'];
    //echo $_SESSION['name'];
    //echo"login";
//remmeber me queryy
     
if(isset($_POST['remember']))
{
    setcookie('username',$uname,time()+30);
    setcookie('password',$pswd,time()+30);
}
else
{
    setcookie('username',$uname,30);
    setcookie('password',$pswd,30);

}



    header('Location: welcome.php');
}
else{

    echo"login failed";
}
   }
   $username_cookie='';
   $psw_cookie='';
if(isset($_COOKIE['username']) && isset($_COOKIE['password']))
{
    //echo"hii";
    $username_cookie=$_COOKIE['username'];
    $psw_cookie=$_COOKIE['password'];
   //echo $username_cookie;
}
?>