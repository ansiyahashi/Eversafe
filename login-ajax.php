<html>
<head>
<script>
function showUser(str) {
  if (str == "") {
    document.getElementById("txtHint").innerHTML = "";
    return;
  } else {
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
        document.getElementById("txtHint").innerHTML = this.responseText;
      }
    };
    xmlhttp.open("GET","login-ajax.php?q="+str,true);
    xmlhttp.send();
  }
}
</script>
</head>
<body>

<form method="post" name="form"  onsubmit="return showUser() ">
    <div align="center">
        <table>

<tr><td>username   </td><td><input type="text" name="username"style="width: 100%" value="<?php if(isset($_COOKIE['username'])){echo $_COOKIE['username'];}; ?>" ><br/><br/>
</td></tr>
<tr><td>password    </td><td><input type="password" name="password"style="width:100%" value="<?php if(isset($_COOKIE['password'])){echo $_COOKIE['password'];}; ?>"><br/><br/></td></tr>


<tr><td></td><td><input type="checkbox" name="remember" value="remember"  />&nbsp&nbsp;Remember Me<br/><br></td></tr>

<tr><td><a href="registration.php">Signup</a></td><td><button name="login1" id="btn">login</button><br/></td></tr>





        </table>

    </div>
</form>

<br>
<div id="txtHint"><b>Person info will be listed here...</b></div>

</body>
</html>
<?php
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
echo$count;
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