<?php

    $username = isset($_POST['username']) ? $_POST['username'] : '';
    $password = isset($_POST['password']) ? $_POST['password'] : '';

    $ok = true;
    $messages = array();

    if ( !isset($username) || empty($username) ) {
        $ok = false;
        $messages[] = 'Username cannot be empty!';
    }

    if ( !isset($password) || empty($password) ) {
        $ok = false;
        $messages[] = 'Password cannot be empty!';
    }

    if ($ok) {

        $con=mysqli_connect("localhost","root","","new_db");
        $qry="select count(*) as cntUser  from registration where email='".$username."' and password='".$password."'";

        $res = mysqli_query($con,$qry);
        //echo $res;
     $dis=mysqli_fetch_array($res);
     //echo $dis["name"];
     $count=$dis['cntUser'];
     //echo$count;
     if($count>0)
     {
        $ok = true;
        $messages[] = 'Successful login!';
     
     
    }
    else{
       
            $ok = false;
            $messages[] = 'Incorrect username/password combination!';
    }

        
       /* if ($username === 'dcode' && $password === 'dcode') {
            $ok = true;
            $messages[] = 'Successful login!';
        } else {
            $ok = false;
            $messages[] = 'Incorrect username/password combination!';
        }*/
    }

    echo json_encode(
        array(
            'ok' => $ok,
            'messages' => $messages
        )
    );

?>