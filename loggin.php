<div class="container">

    <div id="div_login">
        <h1>Login</h1>
        <div id="message"></div>
        <div>
            <input type="text" class="textbox" id="txt_uname" name="txt_uname" placeholder="Username" />
        </div>
        <div>
            <input type="password" class="textbox" id="txt_pwd" name="txt_pwd" placeholder="Password"/>
        </div>
        <div>
            <input type="button" value="Submit" name="but_submit" id="but_submit" />
        </div>
    </div>

</div>


<?php
include "config.php";

$uname = $_POST('txt_uname');
$password = $_POST('txt_pwd');

if ($uname != "" && $password != ""){

    $sql_query = "select count(*) as cntUser from users1 where username='".$uname."' and password='".$password."'";
    $result = mysqli_query($con,$sql_query);
    $row = mysqli_fetch_array($result);

    $count = $row['cntUser'];

    if($count > 0){
        $_SESSION['uname'] = $uname;
        echo 1;
    }else{
        echo 0;
    }

}

?>

